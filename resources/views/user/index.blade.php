@extends('user.layout')
@section('content')
<div>
    <div>
        <a class="btn btn-success m-auto" data-toggle="modal" id="show-create-modal"
            onclick="handleClick('dummy')">
            <i class="material-icons">&#xE147;</i>
            <span>Create New Student</span>
        </a>
    </div>
    <table class="table table-sm table-dark text-center" style="width: 500px;">

        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td id="{{$student->id}}">{{$student->name}}</td>

                <td class="d-flex flex-row justify-content-center">
                    <button class="btn btn-primary" id="show-edit-modal" data-url="{{ $student->id }}"
                        onclick="handleClick({{$student}})">Edit</button>
                    <form method="POST" action="{{ route('student-delete', $student->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $student->id }}" />
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="show-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <input type="text" name="name" value="" class="form-control mt-2" id="student-name"
                            placeholder="Name">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" id="show-update">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection