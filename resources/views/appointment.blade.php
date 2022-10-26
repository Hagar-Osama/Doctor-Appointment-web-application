@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Doctor information</h4>
                    <img src="{{asset('storage/doctors/'.$appointment->doctor->name.'/'.$appointment->doctor->image)}}" style="width: 100px;">
                    <p class="lead">{{$appointment->doctor->name}}</p>
                    Degree: {{$appointment->doctor->education}}<br />
                    Specilaist: {{$appointment->doctor->department}}

                </div>

            </div>
        </div>
        <div class="col-md-9">
            <form action="{{route('endUser.bookAppointment')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">Date: {{$date}}</div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            @foreach($times as $time)
                            <div class="col-md-3">
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="{{$time->time}}">
                                    <span> {{$time->time}}</span></label>
                            </div>
                            <input type="hidden" name="doctorId" value="{{$doctorId}}">
                            <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                            <input type="hidden" name="date" value="{{$date}}">

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if(Auth::check())
                    <button type="submit" class="btn btn-success" style="width: 100%;">Book An Appointment</button>
                    @else
                    <div class="mt-5">
                        <p>Please Log in To Make an Appointment</p>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
<style type="text/css">
    label.btn {
        padding: 0;
    }

    label.btn input {
        opacity: 0;
        position: absolute;

    }

    label.btn span {
        text-align: center;
        padding: 6px 12px;
        display: block;
        min-width: 80px;
    }

    label.btn input:checked+span {
        background-color: rgb(80, 110, 228);
        color: #fff;
    }
</style>
