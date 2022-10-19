@extends('layout.template')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form>
                <ul class="list-group p-3">
                    <h2 class="text-center mb-4">Data Student</h2>
                    <li class="list-group-item p-4 ">
                        <h3> NIM : {{$getAllStudent->nim}}</h3>
                    </li>
                    <li class="list-group-item p-4">
                        <h3> NAME : {{$getAllStudent->name}}</h3>
                    </li>
                    <li class="list-group-item p-4">
                        <h3> MAJOR : {{$getAllStudent->major_name}}</h3>
                    </li>
                    <li class="list-group-item p-4">
                        <h3> ADDRESS : {{$getAllStudent->address}}</h3>
                    </li>
                    <li class="list-group-item p-4">
                        <h3> CREATED_AT : {{$getAllStudent->created_at}}</h3>
                    </li>
                </ul>
                <a href="{{ url('student') }}" type="submit" class="btn btn-primary">Back</a>
            </form>
        </div>

    </div>
</div>