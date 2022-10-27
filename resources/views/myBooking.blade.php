@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Your Appointments') }}({{$myBookings->count()}})
                <a href="{{route('endUser.welcome')}}" class="btn btn-info float-end mx-4">Back</a>

                </div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Time</th>
                            <th scope="col">Date</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Checked Up</th>



                        </tr>
                    </thead>
                    <tbody>
                        @forelse($myBookings as $myBooking)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$myBooking->doctors->name}}</td>
                            <td>{{$myBooking->patients->name}}</td>
                            <td>{{$myBooking->time}}</td>
                            <td>{{$myBooking->date}}</td>
                            <td>{{$myBooking->created_at}}</td>
                            <td>@if($myBooking->checkedUp == 'yes')
                            <span class="badge bg-success">Checked</span>
                                @else
                                <span class="badge bg-danger">Not Checked</span>

                                @endif
                            </td>

                        </tr>
                        @empty
                        <td colspan="6" class="text-danger text-center">You Dont Have Any Appointments</td>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
