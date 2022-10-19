@extends('layout.template')
@section('content')
<div class="container mt-5">
    <h6>Add data student</h6>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('student') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" value="{{ old('nim') }}" class="form-control @error('nim') is-invalid @enderror" autofocus placeholder="Enter name..">
                    @error('nim')
                    <span class="invalid-feedback mt-2" role="alert">
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    </span>
                    @enderror
                </div>
                <div class=" mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name..">
                    @error('name')
                    <span class="invalid-feedback mt-2" role="alert">
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    </span>
                    @enderror
                </div>
                <div class=" mb-3">
                    <select class="form-select @error('major_id') is-invalid @enderror" name="major_id" aria-label="Default select example">
                        <option selected>Open this select Major</option>
                        @foreach($getMajor as $mjr)
                        <option value="{{$mjr->major_id}}">{{$mjr->major_name}}</option>
                        @endforeach
                        @error('major_id')
                        <span class="invalid-feedback mt-2" role="alert">
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        </span>
                        @enderror
                    </select>
                </div>
                <div class=" mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" placeholder="Enter address..">
                    @error('address')
                    <span class="invalid-feedback mt-2" role="alert">
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url('student')}}" type="submit" class="btn btn-info">Back</a>
            </form>
        </div>

    </div>
</div>


@endsection