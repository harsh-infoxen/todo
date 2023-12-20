@extends('user.layout')

@section('content')

<div class="card cards card-2 shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
    <div class="card-body text-center">
        <h5 class="card-title">Edit Students</h5>
    </div>

    <form method="POST" action="/user/update/{{$student->id}}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$student->name}}" class="form-control mt-2"
                        placeholder="Name">
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-3 text-center">

            <div class="col ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
</div>
@endsection