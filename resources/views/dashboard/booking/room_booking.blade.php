@extends('layouts.dashboard')

@section('content')

    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> Моите реервации</h3>
                <p>Списък</p>
            </div>
            <div class="db-title">
                @foreach ($errors->all() as $error)
                    <p style="color:red">{{ $error }}</p>
                @endforeach

                    @if(Session::has('flash_message'))
                        <p style="color:forestgreen">{{ Session::get('flash_title') }}, {{ Session::get('flash_message') }}</p>
                    @endif
            </div>
            <table class="bordered responsive-table">
                <thead>
                <tr>
                    <th>Номер на стая</th>
                    <th>Тип</th>
                    <th>Пристигане</th>
                    <th>Напускане</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th>Плащане</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse($room_bookings as $index => $room_booking)
                <tr>
                    <td>{{ $room_booking->room->room_number}}</td>
                    <td>{{ $room_booking->room->room_type->name}}</td>
                    <td>{{ $room_booking->arrival_date }}</td>
                    <td>{{ $room_booking->departure_date }}</td>
                    <td>Rs. {{ $room_booking->room_cost }}</td>
                    <td>
                        @if($room_booking->status == "pending")
                            <span class="label label-default">Pending</span>
                        @elseif($room_booking->status == "checked_in")
                            <span class="label label-primary">Checked In</span>
                        @elseif($room_booking->status == "checked_out")
                            <span class="label label-success">Checked Out</span>
                        @else
                            <span class="label label-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        @if($room_booking->payment == true)
                            <span class="db-success">Paid</span>
                        @else
                            <span class="db-not-success">Not Paid</span>
                        @endif

                    </td>
                    <td>@if($room_booking->status !== "pending")
                        <a href="{{url('dashboard/room/booking/'.$room_booking->id.'/review')}}"><span class="label label-primary">Ревю</span></a>
                        @endif
                        @if($room_booking->status !== "cancelled")
                            <a href="{{url('dashboard/room/booking/'.$room_booking->id.'/cancel')}}"><span class="label label-danger">Откажи</span></a>
                        @endif
                    </td>

                </tr>
                    @empty
                    <tr>
                        <td>Няма резервации</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $room_bookings->links() }}
    </div>
@endsection
