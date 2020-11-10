@extends('layouts.app')

@section('content')

<!-- <div class="container">	
	<div class="card card shadow-lg p-3 mb-5 bg-white rounded" >
			<div class="row no-gutters">
				<div class="col-md-2">
						<img src="/uploads/avatar/{{$user->avatar}}" style="width:150px; height: 150px;  border-radius: 50%;" >
				</div>
				<div class="col-md-3">
					 <div class="card-body">
						<h2 class="card-title">{{ $user->name }}'s Profile</h2>
						  
							<form enctype="multipart/form-data" action="/profile" method="POST">
							<label class="card-text">Update Profile Image</label>
							<input type="file" name="avatar">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="submit" class="pull-right btn btn-sm btn-outline-primary">
					
							</form>
					</div>
				</div>
		
		</div>
	</div>
	
</div> -->

<center>
	<div class="card mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
     <img src="/uploads/avatar/{{ $user->avatar }}" class="card-img" alt="..." style="padding-top: 15px; padding-left: 10px; padding-bottom: 10px; padding-right: 10px; border-radius: 50%;" >
    </div>
    <div class="col-md-8">
      <div class="card-body">
      	<h2 class="card-title">{{ $user->name }}'s Profile</h2>
						  
							<form enctype="multipart/form-data" action="/profile" method="POST">
							<label class="card-text">Update Profile Image</label>
							<input type="file" name="avatar" style="padding-left:45px;">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<br>
							<input type="submit" class="pull-right btn btn-sm btn-outline-primary">
					
							</form>
      </div>
    </div>
  </div>
</div>	
</center>
@endsection