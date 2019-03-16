
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bilsan Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="{{asset('css/frontend_css/bootstrap.min.css')}}" /> -->
    <link rel="stylesheet" href="{{asset('css/frontend_css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/frontend_css/style.css')}}" />
   <link rel="stylesheet" href="{{asset('css/frontend_css/bootstrap-wysihtml5.css')}}" />
   <!-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet"> -->
    <link href="{{asset('fonts/frontend_fonts/css/font-awesome.css')}}" rel="stylesheet" />
 
  
<body>

@include('layouts.frontLayout.front_header')
<div class='container'>
@yield('content')
</div>
@include('layouts.frontLayout.front_footer')

<script src="{{asset('js/frontend_js/jquery.min.js')}}"></script> 
<script src="{{asset('js/app.js')}}"></script> 
<script src="{{asset('js/frontend_js/main.js')}}"></script> 
<script src="{{asset('js/frontend_js/bootstrap.min.js')}}"></script> 
<script src="{{asset('js/frontend_js/wysihtml5-0.3.0.js')}}"></script> 

<script>
	$('.textarea_editor').wysihtml5();
</script>