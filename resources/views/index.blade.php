<!DOCTYPE html>
<html>
<head>
	<title>To Do List</title>
</head>
<link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
<body>
	<!-- Header -->
	@section('header')
		@include('layout.header')
	@show	
	<!-- END Header -->

	<!-- Content -->
	<div class="container">
		@yield('content')
	</div>
	<!-- END CONTENT -->

	<!-- Floating Action Button Menu -->
	<div class="fixed-action-btn toolbar">
	    <a class="btn-floating btn-large gray">
	      <i class="large material-icons">mode_edit</i>
	    </a>
	    <ul>
	      <li class="waves-effect waves-light"><a class="tooltipped" data-position="top" data-tooltip="Tambah List" href="{{ url('/tambahList') }}"><i class="material-icons">add</i></a></li>
	      <li class="waves-effect waves-light"><a class="tooltipped" data-position="top" data-tooltip="List Selesai" href="{{url('/showdone')}}"><i class="material-icons">done_all</i></a></li>
	    </ul>
	</div>
	<!-- END -->

</body>
</html>

<script type="text/javascript">
	$(function(){
		$('.button-collapse').sideNav();
	});
</script>

@section('js')
@show