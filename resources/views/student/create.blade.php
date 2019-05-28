@extends("student.layout.master")

@section("title","Student Application | Create Form")

@section("body")
	<div class="panel panel-primary">
  	<div class="panel-heading">
  		{{ ucfirst(substr(Route::currentRouteName(),8)) }} Student
  		<a href="{{ url('student') }}" class="btn btn-info pull-right owtbtn">< Back</a>
  	</div>
  	<div class="panel-body">
  		<!-- <form class="form-horizontal" action="/student/@yield('studentId')" method="post"> -->
  			<form class="form-horizontal" enctype="multipart/form-data" action="/student" method="post">
  				@csrf
  				@section("editMethod")
  				@show
  			 <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="@yield('studentName')" name="name" id="name" placeholder="Enter name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Email:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="@yield('studentEmail')" name="email" id="email" placeholder="Enter email">
			    </div>
			  </div>
			   <div class="form-group">
			    <label class="control-label col-sm-2" for="image">Image:</label>
			    <div class="col-sm-10">
			      <input type="file" class="form-control"  name="image" id="image" placeholder="Enter email">
			    </div>
			  </div>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-success">Submit</button>
			    </div>
			  </div>
			</form>
  	</div>
	</div>
@endsection