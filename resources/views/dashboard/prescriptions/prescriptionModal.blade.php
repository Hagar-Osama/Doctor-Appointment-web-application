<!-- Modal -->
<div class="modal fade" id="writePrescription{{$booking->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Write A Prescription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post" action="{{route('prescriptions.store')}}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
                    <input type="hidden" name="user_id" value="{{$booking->user_id}}">
                    <input type="hidden" name="date" value="{{$booking->date}}">

                    <div class="form-group">
                        <label for="exampleInputName1">Disease Name</label>
                        <input type="text" name="disease_name" value="{{old('disease_name')}}" class="form-control @error('disease_name') is-invalid @enderror" id="exampleInputName1" placeholder="Disease Name">
                        @error('disease_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Symptoms</label>
                                <input type="text" name="symptoms" value="{{old('symptoms')}}" class="form-control @error('symptoms') is-invalid @enderror" id="exampleInputEmail3" placeholder="symptoms">
                                @error('symptoms')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Medicine</label>
                        <textarea name="medicine" class="form-control @error('medicine') is-invalid @enderror" id="exampleTextarea1" rows="4">{{old('medicine')}}</textarea>
                        @error('medicine')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">How To Use Medicine</label>
                        <textarea name="how_to_use_medicine" class="form-control @error('how_to_use_medicine') is-invalid @enderror" id="exampleTextarea1" rows="4">{{old('how_to_use_medicine')}}</textarea>
                        @error('how_to_use_medicine')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Feedback</label>
                        <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror" id="exampleTextarea1" rows="4">{{old('feedback')}}</textarea>
                        @error('feedback')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Signature</label>
                        <input type="text" name="signature" value="{{old('signature')}}" class="form-control @error('signature') is-invalid @enderror" id="exampleInputName1" placeholder="Doctor Signature">
                        @error('signature')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
