<?php

namespace App\Http\Controllers;


use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index(){
        $all_teacher = Teacher::latest()->get();
        return view('teacher.index',[
            'all_teacher'=>$all_teacher,
        ]);
    }
    public function create(){
        return view('teacher.create');
    }
    public function store(Request $request  ){

        $this->validate($request,[
            'name'=> 'required',
            'email'=>'required | unique:teachers',
            'cell'=>'required | unique:teachers',
            'age'=>'required',
            'uname'=>'required | max:10 | min: 5| unique:teachers',
            'password'=>'required',
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



            'photo.required'=>'ছবি সিলেক্ট করতে ভুলে গেছেন',
        ]);

        $unique_name = '';
        if ( $request->hasFile('photo')){
            $file = $request->file('photo');
            $unique_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('media/teacher/'),$unique_name);
        }

        Teacher::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'age'=>$request->age,
            'cell'=>$request->cell,
            'uname' => $request->uname,
            'password'=> password_hash($request->password, PASSWORD_DEFAULT)    ,
            'photo'=> $unique_name,
        ]);

        return redirect()->back()->with('success','Teacher Created Successful!');
    }
    public function delete( $id){
        $delete_data = Teacher::find($id);
        $delete_data->delete();

        unlink(public_path('media/teacher/').$delete_data->photo);

        return redirect()->back()->with('success','Staff deleted successfully!');
    }
    public function show( $id){

        $data = Teacher::find($id);
        return view('teacher.show',[
            'single_data'=> $data,
        ]);
    }
    public function edit($id){
        $data = Teacher::find($id);
        return view('teacher.edit',[
            'edit_data'=>$data,
        ]);
    }
    public function update(Request $request,$id){

        $update_data = Teacher::find($id);

        if( $request->hasFile('new_photo'))
        {
            $file = $request->file('new_photo');
            $unique_name = md5(time().rand()). '.'.$file->getClientOriginalExtension();
            $file->move(public_path('media/Teacher/'),$unique_name);

            if ( file_exists(public_path('media/Teacher/').$request->old_photo))
            {
                unlink(public_path('media/Teacher/').$request->old_photo);
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
        $update_data->photo = $unique_name;
        $update_data->update();

        return redirect()->back()->with('success', 'Student updated successful!');
    }

}
