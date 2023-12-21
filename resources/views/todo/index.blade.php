@extends('todo.layout')
@section('content')
<div>
    <div>
        <a class="btn btn-success m-auto" data-toggle="modal" id="show-create-modal" onclick="handleClick('dummy')">
            <i class="material-icons">&#xE147;</i>
            <span>Create New Todo</span>
        </a>
    </div>
    <table class="table table-sm table-dark text-center" style="width: 700px;">

        <thead>
            <tr class="text-center">
                <th scope="col">S.No</th>
                <th>Description</th>
                <th>Completed</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(count($todos) > 0)
            @foreach ($todos as $todo)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td id="descip">{{$todo->description}}</td>
                <td id="todo_{{$todo->id}}">
                    <input type="checkbox" {{ $todo->completed == 1 ? 'checked' : '' }} id="todo-checkbox"
                    data-todo-id="{{ $todo->id }}">
                </td>

                <td>
                    <span id="formatted-date_{{$todo->id}}"></span>
                </td>
                <td class="d-flex flex-row justify-content-center">

                    <button class="btn btn-primary" id="show-edit-modal" data-url="{{ $todo->id }}"
                        onclick="handleClick({{$todo}})">
                        Edit
                    </button>

                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $todo->id }}" />
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </td>

                <script>
            // Format the created_at date using Moment.js
            var createdAt{{$todo->id}} = moment(@json($todo->created_at));
            document.getElementById("formatted-date_{{$todo->id}}").textContent = createdAt{{$todo->id}}.format("MMMM Do YYYY, h:mm:ss a");
        </script>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="3">No todos found.</td>
            </tr>
            @endif
        </tbody>

    </table>

    <!-- Modal -->
    <div class="modal fade" id="show-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Todo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <label for="todo-description"> Description</label>
                        <input type="text" name="description" value="" class="form-control mt-2" id="todo-description"
                            placeholder="Enter your description">
                    </div>
                    <br>
                    <div class="col">
                        <label for="todo-check" id="label-check"> Completed</label>
                        <input type="checkbox" name="check" value="" id="todo-check">
                    </div>
                    <br>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" id="show-update">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection