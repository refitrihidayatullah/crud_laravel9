@extends('layout.template')
@section('content')


<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            Report Data Student 2022
        </div>
        <div class="card-body pl-3 pr-3">

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">NAME</th>
                        <th scope="col">MAJOR</th>
                        <th scope="col">Address</th>
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

                    </tr>
                    @include('student.edit_modal')
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>







@endsection