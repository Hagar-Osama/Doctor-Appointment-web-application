@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{asset('endUserAssets/banner/online-medicine-concept_160901-152.jpg')}}" class="img-fluid" style="border:1px solid #ccc;">

        </div>
        <div class="col-sm-6">
            <h2>Create an account & Book your appointment</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            @auth
            <div class="mt-5">
                <form action="{{route('endUser.logout')}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-success" value="logout">
                </form>
            </div>
            @endauth
            @guest
            <div class="mt-5">
                <a href="{{route('endUser.registerPage')}}"><button class="btn btn-success">Register as Patient</button></a>
                <a href="{{route('endUser.loginPage')}}"><button class="btn btn-secondary">Login</button></a>
            </div>
            @endguest
        </div>

    </div>
    <hr>
    <form method="get" action="{{route('endUser.findDoctor')}}">
        <section class="">
            <div class="card">
                <div class="card-header">Find Doctors</div>
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
                        <div class="col-sm-8">
                            <input type="text" class="form-control " id="datepicker" name="date" autocomplete="off">
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Find doctors</button>
                        </div>

                    </div>
                </div>

            </div>
    </form>

    <div class="card mt-1">
        <div class="card-header"> Doctors available today</div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td><img src="{{asset('storage/doctors/'.$appointment->doctor->name.'/'.$appointment->doctor->image)}}" width="80" style="border-radius: 50%;" alt="{{$appointment->doctor->name}}"></td>
                        <td>{{$appointment->doctor->name}}</td>
                        <td>{{$appointment->doctor->department}}</td>
                        <td>
                            <a href="{{route('endUser.appointment.book',[$appointment->user_id,$appointment->date])}}" class="btn btn-success">Book Appointment</a>
                        </td>
                    </tr>
                    @empty
                    <td>
                        <div col-span="4" class="text-center text-warning">
                            <span>No Doctors found</span>
                        </div>
                    </td>
                    @endforelse

                </tbody>
            </table>


        </div>

    </div>
</div>
<!--date picker component-->
<!-- <example-component></example-component> -->
</section>
</div>


@endsection
