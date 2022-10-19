@extends('layout.template')
@section('content')

@include('sweetalert::alert')


<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            List Students
        </div>
        <div class="card-body pl-3 pr-3">
            <form class="d-flex mb-3" action="{{ url('student') }}" method="get">
                <input class="form-control me-2" name="keyword" value="{{ Request::get('keyword') }}" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="{{ url('/student/create') }}" class="btn btn-sm btn-primary" style="text-decoration: none;padding:8px 15px" role="button">Add Student</a>
            <a href="{{ url('exportlaporan') }}" class="btn btn-sm btn-success" style="text-decoration: none;padding:8px 12px">Export PDF</a>
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
                    <?php $i = $getStudent->firstItem() ?>
                    @foreach($getStudent as $std)
                    <tr>
                        <input type="hidden" class="delete_id" value="{{ $std->student_id }}">
                        <th scope="row">{{$i}}</th>
                        <td>{{$std->nim}}</td>
                        <td>{{$std->name}}</td>
                        <td>{{$std->major_name}}</td>
                        <td>{{$std->address}}</td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <button class="btn-sm btn-warning" data-bs-toggle="modal" href="#modalEditStudent{{$std->student_id}}" role="button">Edit</button>
                                <form action="{{ url('student/'.$std->student_id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm btndelete">Hapus</button>
                                </form>
                                <a href="{{url('student/'.$std->student_id)}}" class="btn btn-sm btn-info">Show</a>
                            </div>
                        </td>

                    </tr>
                    @include('student.edit_modal')
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination -->
            {{ $getStudent->withQueryString()->links() }}
        </div>
    </div>
</div>
<!-- sweet alert delete student -->
@include('student.delete_modal')






@endsection