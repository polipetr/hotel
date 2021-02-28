<?php

namespace App\Http\Controllers\Front;

use App\Algo\Booking;
use App\Model\RoomBooking;
use App\Model\RoomType;
use App\Rules\RoomAvailableRule;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\RoomBooked;


class RoomBookingController extends FrontController
{
    public function book(Request $request, $room_type_id)
    {
        $user = Auth::user();
        $random = Str::random(8);
        $room_type = RoomType::findOrFail($room_type_id);
        $room_booking = new RoomBooking();
        $user->invoice = $random;
        $user->save();

        $room_booking->arrival_date = $request->input('arrival_date');
        $room_booking->departure_date = $request->input('departure_date');
        /**
         * Find total cost by counting number of days and multiplying it with cost of rooms.
         */
        $startTime = Carbon::parse($room_booking->arrival_date);
        $finishTime = Carbon::parse($room_booking->departure_date);
        $no_of_days = $finishTime->diffInDays($startTime) ? $finishTime->diffInDays($startTime) : 1;
        $room_booking->room_cost = $no_of_days * $room_type->finalPrice;


        \PDF::loadView('front.invoice.index',
         ['name' => $user->first_name, 'address' => $user->address, 'type' => $room_type->name, 'price' => $room_type->finalPrice, 'number' => $no_of_days])
          ->setOptions(['dpi' => 150])
         ->save(public_path("pdf/$random.pdf"));
        
        //check here if the user is authenticated
        if (!Auth::check()) {
            return Redirect::to("/login");
        }

        $rules = [
            'number_of_adult' => 'required|numeric|min:1',
            'number_of_child' => 'required|numeric|min:0',
            'arrival_date' => 'required|date|date_format:Y/m/d|after_or_equal:today',
            'departure_date' => 'required|date|date_format:Y/m/d|after_or_equal:'.$request->input('arrival_date'),
        ];

 
        $new_arrival_date = $request->input('arrival_date');
        $new_departure_date = $request->input('departure_date');
        $rules['booking_validation'] = [new RoomAvailableRule($room_type, $new_arrival_date, $new_departure_date)];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }


        $room_booking->user_id = $user->id;
        $room_booking->pay_method = $request->input('pay_method');
        /**
         * Select random room for booking of given room type
         */

        $booking = new Booking($room_type, $new_arrival_date, $new_departure_date);
        //dd($booking->available_room_number());
        $room_booking->room_id = $booking->available_room_number();
        $room_booking->user_id = $user->id;
        $room_booking->save();


        Session::flash('flash_title', "Success");
        Session::flash('flash_message', "Room has been Booked.");
        return redirect('/dashboard/room/booking');

    }

    private function send_email($email){
        if(empty($email)){
            $email = Auth::user()->email;
        }
        Mail::to($email)->send(new RoomBooked());
    }
}
