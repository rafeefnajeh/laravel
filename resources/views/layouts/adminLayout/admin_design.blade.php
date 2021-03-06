<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bilsan Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/matrix-media.css')}}" />
    <link href="{{asset('fonts/backend_fonts/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/backend_css/jquery.gritter.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/uniform.css')}}" />
    <link rel="stylesheet" href="{{asset('css/backend_css/style.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <meta name="csrf-token" content="{{ csrf_token() }}" />




</head>
<body>

@include('layouts.adminLayout.admin_header')
@include('layouts.adminLayout.admin_sidebar')

@include('layouts.adminLayout.message')



@yield('content')

@include('layouts.adminLayout.admin_footer')


<script src="{{asset('js/backend_js/jquery.min.js')}}"></script> 
<script src="{{asset('js/backend_js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('js/backend_js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/backend_js/jquery.uniform.js')}}"></script> 
<script src="{{asset('js/backend_js/select2.min.js')}}"></script>
<script src="{{asset('js/backend_js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/backend_js/matrix.js')}}"></script> 
<script src="{{asset('js/backend_js/matrix.tables.js')}}"></script> 
<script src="{{asset('js/backend_js/bootstrap-datepicker.js')}}"></script> 
<script src="{{asset('js/backend_js/masked.js')}}"></script> 
<script src="{{asset('js/backend_js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('js/backend_js/jquery.validate.js')}}"></script>
<script src="{{asset('js/backend_js/jquery.wizard.js')}}"></script> 
<script src="{{asset('js/backend_js/matrix.wizard.js')}}"></script>
</body>
</html>



 
 
 



 
