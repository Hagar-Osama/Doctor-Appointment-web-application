@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Your Prescriptions') }}
                <a href="{{route('endUser.welcome')}}" class="btn btn-info float-end mx-4">Back</a>

                </div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Disease Name</th>
                            <th scope="col">Symptoms</th>
                            <th scope="col">Medicine Instructions</th>
                            <th scope="col">Medicine</th>
                            <th scope="col">Doctor Feedback</th>
                            <th scope="col">Created At</th>



                        </tr>
                    </thead>
                    <tbody>
                        @forelse($myPrescriptions as $myprescription)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$myprescription->doctor->name}}</td>
                            <td>{{$myprescription->date}}</td>
                            <td>{{$myprescription->disease_name}}</td>
                            <td>{{$myprescription->symptoms}}</td>
                            <td>{{$myprescription->how_to_use_medicine}}</td>
                            <td>{{$myprescription->medicine}}</td>
                            <td>{{$myprescription->feedback}}</td>
                            <td>{{$myprescription->created_at}}</td>




                        </tr>
                        @empty
                        <td colspan="6" class="text-danger text-center">You Dont Have Any Prescriptions</td>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
