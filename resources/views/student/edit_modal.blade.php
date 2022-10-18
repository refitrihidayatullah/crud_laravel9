<div class="modal fade" id="modalEditStudent{{$std->student_id}}" aria-hidden="true" aria-labelledby="modalEditStudent" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('student/'.$std->student_id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" name="nim" value="{{$std->nim}}" placeholder="Enter name..">
                    </div>
                    <div class=" mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$std->name}}" placeholder="Enter name..">
                    </div>
                    <div class=" mb-3">
                        <label for="nim" class="form-label">Major</label>
                        <select class="form-select" name="major_id" aria-label="Default select example">

                            <option value="{{$std->major_id }}" selected>{{$std->major_name}}</option>
                            @foreach($getMajor as $mjr)
                            <option value="{{$mjr->major_id}}">{{$mjr->major_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" value="{{ $std->address }}" id="address" name="address" placeholder="Enter address..">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>