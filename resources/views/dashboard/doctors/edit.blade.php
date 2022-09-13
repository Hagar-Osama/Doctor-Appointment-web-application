@extends('admin.layouts.master')
@section('title')
Edit A Doctor
@endsection
@section('css')
<link rel="icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon" />

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/ionicons/dist/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/icon-kit/dist/css/iconkit.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
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
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Doctor</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('doctor.index')}}">Doctor Page</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="wrapper">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Register Doctor Information</h3>
                        </div>
                        @if (session('error'))
                    <div class="alert alert-success" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                        <div class="card-body">
                            <form class="forms-sample" method="post" action="{{route('doctor.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                                <div class="form-group">
                                    <label for="exampleInputName1">Full Name</label>
                                    <input type="text" name="name" value="{{$doctor->name}}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Doctor Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">Email address</label>
                                            <input type="email" name="email" value="{{$doctor->email}}" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail3" placeholder="Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Role</label>
                                            <select name="role_id" class="form-control  @error('role_id') is-invalid @enderror" id="exampleSelectGender">
                                                <option value="" selected disabled hidden>Select Your Gender</option>
                                                @foreach(App\Models\Role::where('name','!=', 'patient')->get() as $role)
                                                <option value="{{$role->id}}" {{$role->id == $doctor->role_id ? 'selected' : ""}}>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Password</label>
                                            <input type="password" name="password" value="{{$doctor->password}}" class="form-control  @error('password') is-invalid @enderror" id="exampleInputPassword4" placeholder="Password">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Gender</label>
                                            <select name="gender" class="form-control  @error('gender') is-invalid @enderror" id="exampleSelectGender">
                                                <option value="male" {{$doctor->gender == 'male' ? 'selected' : ""}}>Male</option>
                                                <option value="female" {{$doctor->gender == 'female' ? 'selected' : ""}}>Female</option>
                                            </select>
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Address</label>
                                    <input type="text" name="address" value="{{$doctor->address}}" class="form-control  @error('address') is-invalid @enderror" id="exampleInputName1" placeholder="Doctor Address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Phone Number</label>
                                    <input type="text" name="phone_number" value="{{$doctor->phone_number}}" class="form-control  @error('phone_number') is-invalid @enderror" id="exampleInputName1" placeholder="Doctor Phone Number">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Education</label>
                                    <input type="text" name="education" value="{{$doctor->education}}" class="form-control  @error('education') is-invalid @enderror" id="exampleInputName1" placeholder="Doctor Education">
                                    @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Department</label>
                                    <input type="text" name="department" value="{{$doctor->department}}" class="form-control  @error('department') is-invalid @enderror" id="exampleInputName1" placeholder="Doctor specialist">
                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control  @error('image') is-invalid @enderror file-upload-info" placeholder="Upload Image">
                                        @if($doctor->image)
                                        <img src="{{asset('storage/doctors/'.$doctor->name.'/'.$doctor->image)}}" class="table-user-thumb" width="50px" , height="50px" alt="{{$doctor->name}}">
                                        @endif
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Textarea</label>
                                    <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4">{{$doctor->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
    <script src="{{asset('assets/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/theme.min.js')}}"></script>
    <script src="{{asset('assets/js/form-components.js')}}"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
    @endsection
