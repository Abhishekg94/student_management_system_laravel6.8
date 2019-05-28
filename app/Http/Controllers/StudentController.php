<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy("id","desc")->get();
        return view("student.index",compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file("image");
        // echo "File Name: ".$file->getClientOriginalName()."<br>";
        // echo "File Extension: ".$file->getClientOriginalExtension()."<br>";
        // echo "File Real Path: ".$file->getRealPath()."<br>";
        // echo "File Size: ".$file->getSize()."<br>";
        // echo "File Mime Type: ".$file->getMimeType();
       

        // if($request->hasFile("image"))
        // {
        //     $file = $request->file("image");
        //     $file->move("public/upload",$file->getClientOriginalName());
        // }
        $file->move("public/upload",$file->getClientOriginalName());
      

        $data = Validator::make($request->all(),[

            "name" => "required | max:255",
            "email" => "required | max:255 | email"
        ],[

            "name.required" => "Name is needed",
            "email.required" => "Email is needed",
            "email.email" => "email should be valide"
        ])->Validate();

        $obj = new Student;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->st_image = $file->getClientOriginalName();
        $obj->created_dt = date("y-m-d h:i:s");
        $is_saved = $obj->save();
        if($is_saved);
        {
            session()->flash("studentMessage","student has been inserted");
            return redirect('student/create');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view("student.edit",compact("student"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = Validator::make($request->all(),[

            "name" => "required | max:255",
            "email" => "required | max:255 | email"
        ],[

            "name.required" => "Name is needed",
            "email.required" => "Email is needed",
            "email.email" => "email should be valide"
        ])->Validate();


         $student = Student::find($id);
         $student->name = $request->name;
         $student->email =$request->email;
         $is_saved = $student->save();
         if($is_saved){
            session()->flash("studentMessage","Student has been updated");
            return redirect("student/".$id."/edit");
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $is_deleted = $student->delete();
        if($is_deleted){
            session()->flash("studentMessage","Student has been deleted");
            return redirect("student");
        }

    }
}
