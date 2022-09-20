@extends('admin.layouts.master')
@section('title')
Make An Appointment
@endsection
@section('css')
<style type="text/css">
    input[type="checkbox"] {
        zoom: 1.5;
    }

    body {
        font-size: 17px;
    }
</style>
</head>
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
                            <h5>Appointments</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('doctor.index')}}">Appointment Page</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (session('status'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert bg-danger alert-danger text-white" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Choose A Date For Your Appointment</h3>
                    </div>
                    <form method="POST" action="{{route('appointment.checkTime')}}">
                        @csrf
                        <br />
                        @isset($date)
                        <span class="ml-4">Your TimeTable For:</span>
                        {{$date}}
                        @endisset
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-xl-4 mb-30">
                                    <input class="form-control" type="date" name="date" />
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Check</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(Route::is('appointment.checkTime'))
                <form method="POST" action="{{route('appointment.updateTime')}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="appointmentId" value="{{$appointmentId}}">
                <div class="card">
                    <div class="card-header">
                        <h3>Choose Your Appointment Time (AM)</h3>
                        <span style="margin-left: 700px;">Checked/Unchecked
                            <input type="checkbox" onclick="for(c in document.getElementsByName('time[]'))
                         document.getElementsByName('time[]').item(c).checked=this.checked">
                        </span>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td> <input type="checkbox" name="time[]" value="6am" @isset($times){{$times->contains('time', '6am') ? 'checked' : ""}} @endisset> 6am</td>
                                        <td> <input type="checkbox" name="time[]" value="6.20am" @isset($times){{$times->contains('time', '6.20am') ? 'checked' : ""}} @endisset> 6.20am</td>
                                        <td> <input type="checkbox" name="time[]" value="6.40am" @isset($times){{$times->contains('time', '6.40am') ? 'checked' : ""}} @endisset> 6.40am</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td> <input type="checkbox" name="time[]" value="7am" @isset($times){{$times->contains('time', '7am') ? 'checked' : ""}} @endisset> 7am</td>
                                        <td> <input type="checkbox" name="time[]" value="7.20am" @isset($times){{$times->contains('time', '7.20am') ? 'checked' : ""}} @endisset> 7.20am</td>
                                        <td> <input type="checkbox" name="time[]" value="7.40am" @isset($times){{$times->contains('time', '7.40am') ? 'checked' : ""}} @endisset> 7.40am</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td> <input type="checkbox" name="time[]" value="8am" @isset($times){{$times->contains('time', '8am') ? 'checked' : ""}} @endisset> 8am</td>
                                        <td> <input type="checkbox" name="time[]" value="8.20am" @isset($times){{$times->contains('time', '8.20am') ? 'checked' : ""}} @endisset> 8.20am</td>
                                        <td> <input type="checkbox" name="time[]" value="8.40am" @isset($times){{$times->contains('time', '8.40am') ? 'checked' : ""}} @endisset> 8.40am</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td> <input type="checkbox" name="time[]" value="9am" @isset($times){{$times->contains('time', '9am') ? 'checked' : ""}} @endisset> 9am</td>
                                        <td> <input type="checkbox" name="time[]" value="9.20am" @isset($times){{$times->contains('time', '9.20am') ? 'checked' : ""}} @endisset> 9.20am</td>
                                        <td> <input type="checkbox" name="time[]" value="9.40am" @isset($times){{$times->contains('time', '9.40am') ? 'checked' : ""}} @endisset> 9.40am</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td> <input type="checkbox" name="time[]" value="10am" @isset($times){{$times->contains('time', '10am') ? 'checked' : ""}} @endisset> 10am</td>
                                        <td> <input type="checkbox" name="time[]" value="10.20am" @isset($times){{$times->contains('time', '10.20am') ? 'checked' : ""}} @endisset> 10.20am</td>
                                        <td> <input type="checkbox" name="time[]" value="10.40am" @isset($times){{$times->contains('time', '10.40am') ? 'checked' : ""}} @endisset> 10.40am</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td> <input type="checkbox" name="time[]" value="11am" @isset($times){{$times->contains('time', '11am') ? 'checked' : ""}} @endisset> 11am</td>
                                        <td> <input type="checkbox" name="time[]" value="11.20am" @isset($times){{$times->contains('time', '11.20am') ? 'checked' : ""}} @endisset> 11.20am</td>
                                        <td> <input type="checkbox" name="time[]" value="11.40am" @isset($times){{$times->contains('time', '11.40am') ? 'checked' : ""}} @endisset> 11.40am</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Choose Your Appointment Time (PM)</h3>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td> <input type="checkbox" name="time[]" value="12pm" @isset($times){{$times->contains('time', '12pm') ? 'checked' : ""}} @endisset> 12pm</td>
                                        <td> <input type="checkbox" name="time[]" value="12.20pm" @isset($times){{$times->contains('time', '12.20pm') ? 'checked' : ""}} @endisset>12.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="12.40pm" @isset($times){{$times->contains('time', '12.40pm') ? 'checked' : ""}} @endisset>12.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td> <input type="checkbox" name="time[]" value="1pm" @isset($times){{$times->contains('time', '1pm') ? 'checked' : ""}} @endisset> 1pm</td>
                                        <td> <input type="checkbox" name="time[]" value="1.20pm" @isset($times){{$times->contains('time', '1.20pm') ? 'checked' : ""}} @endisset> 1.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="1.40pm" @isset($times){{$times->contains('time', '1.40pm') ? 'checked' : ""}} @endisset> 1.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td> <input type="checkbox" name="time[]" value="2pm" @isset($times){{$times->contains('time', '2pm') ? 'checked' : ""}} @endisset> 2pm</td>
                                        <td> <input type="checkbox" name="time[]" value="2.20pm" @isset($times){{$times->contains('time', '2.20pm') ? 'checked' : ""}} @endisset> 2.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="2.40pm" @isset($times){{$times->contains('time', '2.40pm') ? 'checked' : ""}} @endisset> 2.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td> <input type="checkbox" name="time[]" value="3pm" @isset($times){{$times->contains('time', '3pm') ? 'checked' : ""}} @endisset> 3pm</td>
                                        <td> <input type="checkbox" name="time[]" value="3.20pm" @isset($times){{$times->contains('time', '3.20pm') ? 'checked' : ""}} @endisset> 3.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="3.40pm" @isset($times){{$times->contains('time', '3.40pm') ? 'checked' : ""}} @endisset> 3.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td> <input type="checkbox" name="time[]" value="4pm" @isset($times){{$times->contains('time', '4pm') ? 'checked' : ""}} @endisset> 4pm</td>
                                        <td> <input type="checkbox" name="time[]" value="4.20pm" @isset($times){{$times->contains('time', '4.20pm') ? 'checked' : ""}} @endisset> 4.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="4.40pm" @isset($times){{$times->contains('time', '4.40pm') ? 'checked' : ""}} @endisset> 4.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td> <input type="checkbox" name="time[]" value="5pm" @isset($times){{$times->contains('time', '5pm') ? 'checked' : ""}} @endisset> 5pm</td>
                                        <td> <input type="checkbox" name="time[]" value="5.20pm" @isset($times){{$times->contains('time', '5.20pm') ? 'checked' : ""}} @endisset> 5.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="5.40pm" @isset($times){{$times->contains('time', '5.40pm') ? 'checked' : ""}} @endisset> 5.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td> <input type="checkbox" name="time[]" value="6pm" @isset($times){{$times->contains('time', '6pm') ? 'checked' : ""}} @endisset> 6pm</td>
                                        <td> <input type="checkbox" name="time[]" value="6.20pm" @isset($times){{$times->contains('time', '6.20pm') ? 'checked' : ""}} @endisset> 6.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="6.40pm" @isset($times){{$times->contains('time', '6.40pm') ? 'checked' : ""}} @endisset> 6.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td> <input type="checkbox" name="time[]" value="7pm" @isset($times){{$times->contains('time', '7pm') ? 'checked' : ""}} @endisset> 7pm</td>
                                        <td> <input type="checkbox" name="time[]" value="7.20pm" @isset($times){{$times->contains('time', '7.20pm') ? 'checked' : ""}} @endisset> 7.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="7.40pm" @isset($times){{$times->contains('time', '7.40pm') ? 'checked' : ""}} @endisset> 7.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">15</th>
                                        <td> <input type="checkbox" name="time[]" value="8pm" @isset($times){{$times->contains('time', '8pm') ? 'checked' : ""}} @endisset> 8pm</td>
                                        <td> <input type="checkbox" name="time[]" value="8.20pm" @isset($times){{$times->contains('time', '8.20pm') ? 'checked' : ""}} @endisset> 8.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="8.40pm" @isset($times){{$times->contains('time', '8.40pm') ? 'checked' : ""}} @endisset> 8.40pm</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">16</th>
                                        <td> <input type="checkbox" name="time[]" value="9pm" @isset($times){{$times->contains('time', '9pm') ? 'checked' : ""}} @endisset> 9pm</td>
                                        <td> <input type="checkbox" name="time[]" value="9.20pm" @isset($times){{$times->contains('time', '9.20pm') ? 'checked' : ""}} @endisset> 9.20pm</td>
                                        <td> <input type="checkbox" name="time[]" value="9.40pm" @isset($times){{$times->contains('time', '9.40pm') ? 'checked' : ""}} @endisset> 9.40pm</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
    @endif
</div>
</div>
@endsection

