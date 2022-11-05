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
                            <h5>All Prescriptions</h5>
                            <span>Prescription Information({{$prescriptions->count()}})</span>
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
                                <a href="#">Prescriptions</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">prescriptions Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('status') }}
            </div>
            @endif
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
                        <th scope="col">Date</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Prescription</th>




                    </tr>
                </thead>
                <tbody>
                    @forelse($prescriptions as $prescription)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td><img src="{{asset('storage/profile'.'/'.$prescription->patient->name.'/'.$prescription->patient->image)}}" width="80" style="border-radius:50%"></td>
                        <td>{{$prescription->doctor->name}}</td>
                        <td>{{$prescription->patient->name}}</td>
                        <td>{{$prescription->patient->email}}</td>
                        <td>{{$prescription->patient->phone_number}}</td>
                        <td>{{$prescription->patient->gender}}</td>
                        <td>{{$prescription->date}}</td>
                        <td>{{$prescription->created_at}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <a href="{{route('prescriptions.show', [$prescription->user_id, $prescription->date])}}" class="btn btn-info">
                                view prescription
                            </button>
                        </td>
                    </tr>
                    @empty
                    <td colspan="6" class="text-danger text-center">There Is No Appointments</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
