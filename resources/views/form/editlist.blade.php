@section('js')
<script type="text/javascript">
	function readURL(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e){
				$("#showgambar").attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#inputgambar").change(function () {
        readURL(this);
	 });
</script>
@stop

@extends('index')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="card">
		<div class="card-panel teal white-text">
			<h3 align="center">E D I T  &nbsp; L I S T</sh3>
		</div>
		<form method="post" action="{{url('update', Request::segment(2))}}" class="card-panel" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="title" value="{{$edit->title}}" class="validate" id="title">
					<label for="title">Title</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="description" value="{{$edit->description}}" class="validate" id="desc">
					<label for="desc">Description</label>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<img src="{{asset('image/'.$edit->image)}}" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
				</div>
				<div class="col s6">
					<input type="file" name="gambar" id="inputgambar">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<button type="submit" class="btn btn-default blue col s12">Update</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

@endsection