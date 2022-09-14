@extends('admin.layouts.master')
@section('title')
Doctors List
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
                            <h5>All Doctor</h5>
                            <span>Doctor Information</span>
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
                                <a href="#">Doctors</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Doctor Table</h3>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="nosort">Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th class="nosort">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctors as $doctor)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('storage/doctors/'.$doctor->name.'/'.$doctor->image)}}" class="table-user-thumb" alt="{{$doctor->name}}"></td>
                                    <td>{{$doctor->name}}</td>
                                    <td>{{$doctor->email}}</td>
                                    <td>{{$doctor->phone_number}}</td>
                                    <td>{{$doctor->address}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="" data-toggle="modal" data-target="#showDoctor{{$doctor->id}}"><i class="ik ik-eye"></i></a>
                                            <a href="{{route('doctor.edit',$doctor->id)}}"><i class="ik ik-edit-2"></i></a>
                                            <a href="" data-toggle="modal" data-target="#deleteDoctor{{$doctor->id}}"><i class="ik ik-trash-2"></i></a>
                                        </div>
                                    </td>
                                    @include('dashboard.doctors.show')
                                    @include('dashboard.doctors.delete')

                                    @empty
                                    <td>
                                        <div class="text-center text-warning">
                                            <span>No Doctors found</span>
                                        </div>
                                    </td>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

