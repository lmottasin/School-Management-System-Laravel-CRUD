<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $staff = Staff::latest()->get();

        return view('staff.index',[
            'all_staff' => $staff,
        ]);
    }


    public function create(){
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name'=> 'required',
           'email'=> 'required | unique:staff',
           'cell'=> 'required | unique:staff',
           'uname'=>'required | max:10 | min:5 | unique:staff',
        ], [
            'name.required' => 'আপনি নামের ঘরে ভুল করেছেন',
            'email.required'=>'ইমেইলের ঘরটি খালি কেন ?',
            'email.unique'=> 'এই ইমেইলটি আগেই কেউ একজন ব্যবহার করে ফেলেছে !',
        ]);

        $unique_name = '';
        if ( $request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $unique_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('media/staff'),$unique_name);
        }

        Staff::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'uname'=> $request->uname,
            'password'=> password_hash($request->password, PASSWORD_DEFAULT),
            'age'=> $request->age,
            'cell'=> $request->cell,
            'photo'=> $unique_name,
        ]);
        return redirect()->back()->with('success','Staff added successful!');
    }

    /**
     *
     */

    public function show($id){

        $data = Staff::find($id);

        return view('staff.show',[
            'single_data'=>$data,
        ]);
    }
    public function delete($id){

        $delete_data = Staff::find($id);
        $delete_data->delete();

        unlink(public_path('media/staff/').$delete_data->photo);

        return redirect()->back()->with('success','Staff deleted successfully!');
    }
    public function edit($id)
    {
       $edit_data = Staff::find($id)    ;
       return view('staff.edit',[
           'edit_data'=>$edit_data,
       ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {

        /**
         * photo update
         */
        if ( $request->hasFile('new_photo'))
        {
            $file = $request->file('new_photo');
            $unique_name = md5(time().rand()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('media/staff/'),$unique_name);

            // delete old file
            if ( file_exists(public_path('media/staff/').$request->old_photo))
            {
                unlink(public_path('media/staff/').$request->old_photo);
            }

        }
        else
        {
            $unique_name = $request->old_photo;
        }
        $update_data = Staff::find($id);
        $update_data->name = $request->name;
        $update_data->email = $request->email;
        $update_data->cell = $request->cell;
        $update_data->age = $request->age;
        $update_data->uname = $request->uname;
        $update_data->photo = $unique_name;
        $update_data->update();

        return redirect()->back()->with('success','Staff updated successful!');
    }
}
