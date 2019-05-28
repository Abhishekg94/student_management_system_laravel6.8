@extends("student.create")

@section("studentId",$student->id)

@section("studentName",$student->name)

@section("studentEmail",$student->email)

@section("editMethod")
	{{ method_field('PUT') }}
@endsection