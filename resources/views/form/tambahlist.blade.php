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
			<h3 align="center">A D D  &nbsp; L I S T</sh3>
		</div>
		<form method="post" action="{{url('store')}}" class="card-panel" enctype="multipart/form-data">
			{!! csrf_field() !!}
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="title" class="validate" id="title">
					<label for="title">Title</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" name="desc" class="validate" id="desc">
					<label for="desc">Description</label>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<img src="http://placehold.it/200x200" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
				</div>
				<div class="col s6">
					<input type="file" name="gambar" id="inputgambar">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<button type="submit" class="btn btn-default col s12">Save</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

@endsection