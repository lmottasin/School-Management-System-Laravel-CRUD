<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {

        $all_data = Student::latest()->get();

        return view('student.index',[
            'all_student_data'=> $all_data,
        ]);
    }
    public function create(){
        return view('student.create');
    }
    public function store(Request $request){

        $this->validate($request,[
            'name' =>'required',
            'email'=> 'required | unique:students',
            'cell'=> 'unique:students',
            'age'=>'required',

            'uname'=>'required | unique:students',
            'password'=>'required',

            'class'=>'required',

            'photo'=>'required',

        ],[
            'name.required' =>'আপনি নামের ঘরে কিছু দেন নি',
            'email.required'=> 'আপনি ইমেইলের ঘরে কিছু দেন নি',
            'email.unique'=> 'এই ইমেইলটি আগেই কেউ নিয়ে নিছে',
            'cell.required'=> 'ফোন নাম্বার দিতে ভুলে গেছেন',
            'cell.unique'=> 'এই ফোন নাম্বারটি আগেই কেউ নিয়ে নিছে',
            'age.required'=>'বয়স দিতে ভুলে গেছেন',

            'uname.required'=>'ইউজারনেম দিতে ভুলে গেছেন',
            'uname.unique'=> 'এই ইউজারনেমটি আগেই কেউ নিয়ে নিছে',

            'password.required'=>'পাসওয়ার্ড দিতে ভুলে গেছেন',

            'class.required'=>'ক্লাসের ঘরে ক্লাস দিন',

            'photo.required'=>'ছবি সিলেক্ট করতে ভুলে গেছেন',
        ]);
        /**
         * photo uplaod
         */
        $unique_name = '' ;
        if ( $request->hasFile('photo')){
            $file = $request->file('photo');
            $unique_name= md5(time().rand()).'.'. $file->getClientOriginalExtension();
            $file->move(public_path('media/student/'),$unique_name);
        }

        Student::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'cell'=>$request->cell,
            'age'=>$request->age,

            'uname'=>$request->uname,
            'password'=> password_hash($request->password,PASSWORD_DEFAULT ),

            'class'=>$request->class,

            'photo'=> $unique_name,
        ]);

        return redirect()->back()->with('success','Student Created Successful!');
    }

    public function edit($id)
    {
        $edit_data = Student::find($id);

        return view('student.edit',[
            'edit_data'=>$edit_data,
        ]);
    }
    public function update(Request $request,$id){

        $update_data = Student::find($id);

        if( $request->hasFile('new_photo'))
        {
            $file = $request->file('new_photo');
            $unique_name = md5(time().rand()). '.'.$file->getClientOriginalExtension();
            $file->move(public_path('media/student/'),$unique_name);

            if ( file_exists(public_path('media/student/').$request->old_photo))
            {
                unlink(public_path('media/student/').$request->old_photo);
            }
        }
        else{
            $unique_name = $request->old_photo;
        }

        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->cell = $request->cell ;
        $update_data->age = $request->age;
        $update_data->uname = $request->uname;
        $update_data->class = $request->class;
        $update_data->photo = $unique_name;
        $update_data->update();

        return redirect()->back()->with('success', 'Student updated successful!');



    }
    public function show($id){
        $data = Student::find($id);

        return view('student.show',[
            'single_data'=>$data,
        ]);
    }
    public function delete($id){
        $data = Student::find($id);
        $data -> delete();

        //photo delete
        unlink(public_path('media/student/').$data->photo);

        return redirect()->back()->with('success','Student Deleted Successful!');
    }
}
