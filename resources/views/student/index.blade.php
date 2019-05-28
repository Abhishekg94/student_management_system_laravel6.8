@extends("student.layout.master")

@section("title","Student Application | Listing")

@section("body")
	<div class="panel panel-primary">
  	<div class="panel-heading">Student List
  		<a href="{{ url('student/create')}}" class="btn btn-success pull-right owtbtn">+Add Student</a>
  	</div>
 	<div class="panel-body">
 		
 		<table class="table">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php $i = 1;  ?>
    	@foreach($students as $student)
      <tr>
      	<td>{{ $i++ }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
       <td>  @php if(!empty($student->st_image)) {  @endphp
             <img src="{{  url('public/upload/'.$student->st_image) }}" style="height:50px; width="50px;">
         @php } else { @endphp
              <h4>No image found</h4>
          @php } @endphp
        </td>
        <td>
        <a href="{{ url('student/'.$student->id.'/edit') }}"  class="btn btn-info">Edit</a>
        	<form action="/student/{{ $student->id }}" class="pull-right" method="post">
              @csrf
              {{ method_field("DELETE") }}
              <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
        @endforeach
    </tbody>
  </table>


 	</div>
	</div>
@endsection