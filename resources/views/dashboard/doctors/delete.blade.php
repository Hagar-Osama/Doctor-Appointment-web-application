<!-- Doctor Information Modal -->
<div class="modal fade" id="deleteDoctor{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Doctor Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('doctor.destroy')}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                    <p><img src="{{asset('storage/doctors/'.$doctor->name.'/'.$doctor->image)}}" class="table-user-thumb" width="200px" alt="{{$doctor->name}}"></p>
                    <p class="badge badge-pill badge-info mb-1">Role: {{$doctor->role->name}}</p>
                    <p>Name: {{$doctor->name}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger mr-2">Confirm</button>

            </div>
            </form>
        </div>
    </div>
</div>
