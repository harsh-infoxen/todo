@extends('user.layout')

@section('content')

<div class="card cards card-2 shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
    <div class="card-body text-center">
        <h5 class="card-title">Add Students</h5>
    </div>

    <div class="card-body">

        <form action="{{ url('/') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="">Student Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>

        </form>

    </div>
</div>


@endsection