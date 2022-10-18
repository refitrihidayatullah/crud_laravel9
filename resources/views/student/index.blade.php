@extends('layout.template')
@section('content')

@include('sweetalert::alert')
<!-- <div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter name..">
                </div>
                <div class=" mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name..">
                </div>
                <div class=" mb-3">
                    <label for="major" class="form-label">Major</label>
                    <input type="text" class="form-control" id="major" name="major" placeholder="Enter major..">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
</div> -->

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            List Students
        </div>
        <div class="card-body pl-3 pr-3">
            <form class="d-flex mb-3">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="{{ url('/student/create') }}" class="btn-sm btn-primary" style="text-decoration: none;padding:11px 15px" role="button">Add Student</a>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">NAME</th>
                        <th scope="col">MAJOR</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getStudent as $std)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$std->nim}}</td>
                        <td>{{$std->name}}</td>
                        <td>{{$std->major_name}}</td>
                        <td>{{$std->address}}</td>
                        <td>
                            <button class="btn-sm btn-warning" data-bs-toggle="modal" href="#modalEditStudent{{$std->student_id}}" role="button">Edit</button>
                        </td>
                    </tr>
                    @include('student.edit_modal')
                    @endforeach
                </tbody>
            </table>
            <!-- pagination -->
            {{ $getStudent->links() }}
        </div>
    </div>
</div>







@endsection