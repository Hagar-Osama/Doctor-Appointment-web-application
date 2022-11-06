@extends('admin.layouts.master')
@section('title')
Departments List
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
                            <h5>All Departments</h5>
                            <span>Department Information</span>
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
                                <a href="#">Department</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Department Table</li>
                        </ol>
                    </nav>
                    @include('dashboard.department.create')
                </div>
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
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Department Table</h3>
                        <a href="" data-toggle="modal" class="btn btn-info mx-5" data-target="#addDepartment">Add Department</a>
                    </div>
                    <div class="card-body">
                        <table id="data_table" class="table col-12">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Department Name</th>
                                    <th class="nosort">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($departments as $department)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$department->department}}</td>

                                    <td>
                                        <div class="table-actions">
                                            <a href="" data-toggle="modal" data-target="#editDepartment{{$department->id}}"><i class="ik ik-edit-2"></i></a>
                                            <a href="" data-toggle="modal" data-target="#deleteDepartment{{$department->id}}"><i class="ik ik-trash-2"></i></a>
                                        </div>
                                    </td>
                                    @include('dashboard.department.edit')
                                    @include('dashboard.department.delete')

                                    @empty
                                    <td>
                                        <div class="text-center text-warning">
                                            <span>No Departments found</span>
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

