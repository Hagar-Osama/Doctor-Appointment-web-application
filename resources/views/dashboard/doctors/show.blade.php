<!-- Doctor Information Modal -->
<div class="modal fade" id="showDoctor{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Doctor Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><img src="{{asset('storage/doctors/'.$doctor->name.'/'.$doctor->image)}}" class="table-user-thumb" width="200px" alt="{{$doctor->name}}"></p>
                <p class="badge badge-pill badge-info mb-1">Role: {{$doctor->role->name}}</p>
                <p>Name: {{$doctor->name}}</p>
                <p>Gender: {{$doctor->gender}}</p>
                <p>Email: {{$doctor->email}}</p>
                <p>Phone Number: {{$doctor->phone_number}}</p>
                <p>Address: {{$doctor->address}}</p>
                <p>Department: {{$doctor->department}}</p>
                <p>Education: {{$doctor->education}}</p>
                <p>Description: {{$doctor->description}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
