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
            <form action="" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">Date: {{$date}}</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($times as $time)
                            <div class="col-md-3">

                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="status" value="available">


                                    <span> {{$time->time}}</span></label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success" style="width: 100%;">Book An Appointment</button>
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
