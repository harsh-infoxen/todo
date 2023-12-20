
// $(document).ready(function () {
//     console.log("asd")
//     $(".btn").click(function () {
//         var id = $(this).attr('id');
//         console.log(id);
//         $("#show-modal").modal("show");
//     });
// });

function handleClick(student) {
    if(student === "dummy"){
        console.log("this is simple craete button");
        $("#show-modal").modal("show");
        $('#show-update').click(function () {
            var StudentName = $("#student-name").val();
            $.ajax({
                url: `/`,
                method: 'post',
                data: {
                    'name': StudentName,
                    _method: 'POST',
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (data) {
                    console.log("chla");
                    console.log(data);
                    history.go(0);
                }
            });
        })
    
    }
    else{
    console.log(student)
    $("#student-name").val(student.name);
    $("#show-modal").modal("show");

    $('#show-update').click(function () {
        var currentStudentName = $("#student-name").val();
        console.log(student.id);
        $.ajax({
            url: `/user/${student.id}`,
            method: 'post',
            data: {
                'name': currentStudentName,
                'id': student.id,
                _method: 'PUT',
                _token: $('meta[name="csrf-token"]').attr('content'),

            },
            success: function (data) {
                console.log("chla");
                console.log(data);
                history.go(0);
            }
        });
    })

}

}



