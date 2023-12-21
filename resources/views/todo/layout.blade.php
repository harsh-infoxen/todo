<!DOCTYPE html>
<html>

<head>
    <title>TODO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- Import Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

   
</head>

<body style="background:#f2f5f1;" class="display-flex justify-content-center align-items-center">

    <div class="d-flex container-fluid w-100 justify-content-center align-items-center">
        @yield('content')

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/index.js')}}"></script>

    <script>
        // Format the created_at date using Moment.js
        var createdAt{{ $todo-> id}} = moment("{{$todo->created_at}}");
        document.getElementById("formatted-date_{{$todo->id}}").textContent = createdAt{ { $todo -> id } }.format("MMMM Do YYYY, h:mm:ss a");
    </script>

</body>

</html>