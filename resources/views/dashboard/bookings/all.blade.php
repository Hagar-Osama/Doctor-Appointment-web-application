@extends('admin.layouts.master')
@section('title')
Bookings List
@endsection
@section('css')
<link rel="icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon" />

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/ionicons/dist/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/icon-kit/dist/css/iconkit.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/dist/css/theme.min.css')}}">
<script src="{{asset('assets/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>All Booked Appointments</h5>
                            <span>Booking Information({{$bookings->count()}})</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Appointments</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Booking Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Image</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Email</th>
                        <th scope="col">Patient Phone</th>
                        <th scope="col">Patient Gender</th>
                        <th scope="col">Time</th>
                        <th scope="col">Date</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Checked Up</th>



                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td><img src="{{asset('storage/profile'.'/'.$booking->patients->name.'/'.$booking->patients->image)}}" width="80" style="border-radius:50%"></td>
                        <td>{{$booking->doctors->name}}</td>
                        <td>{{$booking->patients->name}}</td>
                        <td>{{$booking->patients->email}}</td>
                        <td>{{$booking->patients->phone_number}}</td>
                        <td>{{$booking->patients->gender}}</td>
                        <td>{{$booking->time}}</td>
                        <td>{{$booking->date}}</td>
                        <td>{{$booking->created_at}}</td>
                        <td>@if($booking->checkedUp == 'no')
                            <a href="{{route('updateStatus', [$booking->id])}}"><button class="btn btn-danger">Pending</button></a>
                            @else
                            <a href="{{route('updateStatus', [$booking->id])}}"><button class="btn btn-success">Checked</button></a>

                            @endif
                        </td>

                    </tr>
                    @empty
                    <td colspan="6" class="text-danger text-center">There Is No Appointments</td>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{$bookings->links()}}
    </div>
</div>
@endsection
