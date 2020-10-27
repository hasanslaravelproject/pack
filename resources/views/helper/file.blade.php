


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('/backend/pluggin/datatables/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/pluggin/datatables/css/dataTables.bootstrap4.min.css')}}">

</head>
<body>
    <input type="text" value="{{Request::url()}}" id="url" hidden>
    <div class=" container pt-5">
      @yield('content')
    </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="{{asset('backend/js/jquery.min.js')}}" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    <title>Document</title>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{asset('backend/js/ajax.js')}}"></script>
    <script src="{{asset('backend/pluggin/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/pluggin/datatables/js/jquery.dataTables.min.js')}}"></script>

    </body>

    </html>
<!-- Button trigger modal -->

