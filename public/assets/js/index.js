
function handleClick(todo) {
    if (todo === "dummy") {
        console.log("this is simple create button");
        $("#show-modal").modal("show");
        $("#todo-check").hide();
        $("#label-check").hide();
        $('#show-update').click(function () {
            var TodoDescription = $("#todo-description").val();
       
            $.ajax({
                url: `/todo`,
                method: 'post',
                data: {
                    'description': TodoDescription,
                    _method: 'POST',
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (data) {
                    console.log("Create Success Run");
                    console.log(data);
                    history.go(0);
                }
            });

        })

    }
    else {
        console.log(todo)
        $("#todo-description").val(todo.description);
        $("#todo-check").prop('checked', todo.completed == 1);
        $("#show-modal").modal("show");
        console.log("chla")

        $('#show-update').click(function () {
            var currentTodoDescription = $("#todo-description").val();
            var TodocheckedValue = $('#todo-check').is(":checked");
            console.log(currentTodoDescription, TodocheckedValue);

            $.ajax({
                url: `/todo/${todo.id}`,
                method: 'post',
                data: {
                    'description': currentTodoDescription,
                    'completed': TodocheckedValue,
                    'id': todo.id,
                    _method: 'PUT',
                    _token: $('meta[name="csrf-token"]').attr('content'),
    
                },
                success: function (data) {
                    console.log("chla");
                    console.log(data);
                    history.go(0);
                },
                error: function (xhr, textStatus, errorThrown) {
                    // Handle errors here, e.g., display an error message to the user
                    console.error('Error updating todo:', errorThrown);
                }
            });
        })
    

    }

}


$(document).ready(function () {

    $(document).on('click', '#todo-checkbox', function () {
        var todoId = $(this).data('todo-id');
        var TodocheckedValue = $(this).prop('checked') ? 1 : 0;
        console.log(TodocheckedValue);
        
        $.ajax({
            url: `/todo/${todoId}/status/`,
            method: 'post',
            data: {
                'completed': TodocheckedValue,
                'id': todoId,
                _method: 'PUT',
                _token: $('meta[name="csrf-token"]').attr('content'),

            },
            success: function (data) {
                console.log("todo-checkbox Status update");
                console.log(data);
                history.go(0);
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error updating todo:', errorThrown);
            }
        });
    });

})


