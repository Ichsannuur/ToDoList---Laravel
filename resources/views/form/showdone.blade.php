@extends('index')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

  <form action="{{url('/')}}" method="get">
    <div class="row">
          <div class="input-field col s12">
            <input type="text" value="{{Request::get('q')}}" class="validate" name="search">
            <label for="title">Cari</label>
          </div>
           <button type="submit" class="btn btn-flat pink accent-3 waves-effect waves-light white-text right">Cari <i class="material-icons right">search</i></button>
           <a href="{{url('/')}}" class="btn btn-flat blue accent-3 waves-effect waves-light white-text right">Refresh <i class="material-icons right">refresh</i></a>
    </div>
 </form>

	<div class="row">
		<?php $no = 1; ?>

		@foreach($datas as $data)
    
    <?php 
        $background_colors = array('red', 'blue', 'teal', 'pink', 'purple');
        $rand_background = $background_colors[array_rand($background_colors)];
     ?>

    	<div class="col s12 m4">
      		<div class="card">
        <div class="card-image">
          <div class="card-panel white-text {{ $rand_background }}">
          		<h2 align="center">{{ $no++ }}</h1>
          </div>

          <!-- <div class="fixed-action-btn horizontal" style="position:relative; float:right; bottom:40px; right:40px">
		    <a class="btn-floating btn-large red">
		      <i class="large material-icons">menu</i>
		    </a>
		    <ul>
		      <li><a href="{{url('delete', $data->id)}}" onclick="return confirm('Are You Sure ?')" class="btn-floating red tooltipped" data-tooltip="Delete" data-position="bottom"><i class="material-icons">delete</i></a></li>
		      <li><a href="{{url('editList', $data->id)}}" class="btn-floating blue tooltipped" data-tooltip="Edit" data-position="bottom"><i class="material-icons">edit</i></a></li>
		      <li><a href="{{url('done', $data->id)}}" class="btn-floating green tooltipped" data-tooltip="Done" data-position="bottom"><i class="material-icons">done</i></a></li>
		    </ul>
		  </div> -->

        </div>
        <div class="card-content">
        	<span class="card-title">{{ $data['title'] }}</span>
            <p>{{$data['description']}}</p>
        </div>
      </div>
    </div>
    @endforeach
    {{ $datas->render() }}
  </div>

</body>
</html>
@endsection