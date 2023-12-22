@extends('layouts.app')

@section('content')
<div>
@if(isset($error))
        <div class="alert alert-danger">
        {{ $error }}
        </div>
    @else
    <div>
        <a class="btn btn-success m-auto" data-toggle="modal" id="show-create-modal" onclick="handleClick('dummy')">
        <i class="fas fa-solid fa-cart-plus"></i>
            <span>Create New Todo</span>
        </a>
    </div>
    <table class="table table-sm table-dark text-center" style="width: 700px;">

        <thead>
            <tr class="text-center">
                <th scope="col">S.No</th>
                <th>Description</th>
                @if(!auth()->user()->hasRole('Admin'))
                <th>Completed</th>
                @endif
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody style=" border-style: none; vertical-align: middle !important; border-width: 1 !important;">
            @if(count($todos) > 0)
            @foreach ($todos as $todo)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td id="descip">{{$todo->description}}</td>

                @if(!auth()->user()->hasRole('Admin'))
                <td id="todo_{{$todo->id}}">
                    <input type="checkbox" {{ $todo->completed == 1 ? 'checked' : '' }} id="todo-checkbox" data-todo-id="{{ $todo->id }}">
                </td>
                @endif

                <td>
                    <span id="formatted-date_{{$todo->id}}"></span>
                </td>
                <td class="d-flex flex-row justify-content-center" >
                @if(!auth()->user()->hasRole('Admin'))
                    <button class="btn btn-primary" id="show-edit-modal" data-url="{{ $todo->id }}" onclick="handleClick({{$todo}})" style="margin: 0 10px;">
                    <i class="fas fa-solid fa-gear"></i>
                        Edit
                    </button>
                    @endif

                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{ $todo->id }}" />
                        <button class="del-btn" style="background: #dc3545; color: #fff;">
                            <i class="fas fa-solid fa-trash"></i>
                            <input type="submit" value="delete" class="btn btn-danger">
                        </button>
                        
                    </form>
                </td>

                <script>
                    var createdAt{{$todo->id}} = new Date("{{ $todo->created_at }}");
                    var options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
                    document.getElementById("formatted-date_{{$todo->id}}").textContent = createdAt{{$todo->id}}.toLocaleDateString('en-US', options);
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
                        <input type="text" name="description" value="" class="form-control mt-2" id="todo-description" placeholder="Enter your description">
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
    @endif
</div>

@endsection