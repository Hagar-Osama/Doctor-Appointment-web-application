<!-- Doctor Information Modal -->
<div class="modal fade" id="deleteDepartment{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('department.destroy')}}">
                    @csrf
                    @method('DELETE')
                    <p>Are You Sure You Want to delete this Department</p>
                    <input type="hidden" name="departmentId" value="{{$department->id}}">
                    <input type="text" name="department" value="{{$department->department}}">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger mr-2">Confirm</button>

            </div>
            </form>
        </div>
    </div>
</div>
