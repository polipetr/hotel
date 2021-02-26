<?php

namespace App\Http\Controllers\Admin;

use App\Model\RoomBooking;
use App\Model\Room;

class ReportingController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_bookings = RoomBooking::all();
        $room = Room::all();
        return view('admin.reporitng.index')->with([
            'all' => $room->count(),
            'booked' => $room_bookings->count()
        ]);
    }
}
