<!-- Doctor Information Modal -->
<div class="modal fade" id="editDepartment{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('department.update')}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="departmentId" value="{{$department->id}}">
                    <div class="form-group ml-3 mt-3">
                    <label for="exampleInputName1">Department Name</label>
                    <input type="text" name="department" value="{{$department->department}}" class="form-control @error('department') is-invalid @enderror" id="exampleInputName1" placeholder="Department Name">
                    @error('department')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info mr-2">Confirm</button>

            </div>
            </form>
        </div>
    </div>
</div>
