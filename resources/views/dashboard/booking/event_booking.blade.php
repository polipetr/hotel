@extends('layouts.dashboard')

@section('content')

    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> Моите резевации</h3>
                <p>Виж резевации.</p>
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
                    <th>No</th>
                    <th>Събитие</th>
                    <th>Място</th>
                    <th>Дата</th>
                    <th>No на билета</th>
                    <th>Разходи</th>
                    <th>Статус</th>
                    <th>Плащане</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse($event_bookings as $index => $event_booking)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $event_booking->event->name}}</td>
                    <td>{{ $event_booking->event->venue}}</td>
                    <td>{{ $event_booking->event->date}}</td>
                    <td>{{ $event_booking->number_of_tickets }}</td>
                    <td>Rs. {{ $event_booking->total_cost }}</td>
                    <td>
                        @if($event_booking->status == true)
                            <span class="db-success">Active</span>
                        @else
                            <span class="db-not-success">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        @if($event_booking->payment == true)
                            <span class="db-success">Paid</span>
                        @else
                            <span class="db-not-success">Not Paid</span>
                        @endif
                    </td>
                    <td>
                        @if($event_booking->status == true)
                            <a href="{{url('dashboard/event/booking/'.$event_booking->id.'/cancel')}}"><span class="label label-danger">Cancel</span></a>
                        @endif
                    </td>

                </tr>
                    @empty
                    <tr>
                        <td>Sorry, no bookings found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $event_bookings->links() }}
    </div>
@endsection
