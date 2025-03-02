<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //แสดงหน้าผู้ลงทะเบียน
    public function registration()
    {
        return view('register');
    }
    public function processRegistration(Request $request)
    {
        $validtor = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|same:confirm-password',
            'confirm-password' => 'required',
        ]);
        if ($validtor->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('ลงทะเบียนสำเร็จ');
            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validtor->errors()
            ]);
        }
    }
    //แสดงหน้าเข้าใช้
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validtor = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validtor->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('profile');
            } else {
                return redirect()->route('login')->with('error', 'ไม่มีอีเมลที่สมัคร/รหัสผ่านไม่ถูกต้อง');
            }
        } else {
            return redirect()->route('login')
                ->withErrors($validtor)
                ->withInput($request->only('email'));
        }
    }
    public function profile()
    {

        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();

        return view('profile', [
            'user' => $user
        ]);
    }


    public function updateProfile(Request $request)
{
    $id = Auth::user()->id;

    $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'email' => 'required|email|unique:users,email,' . $id . ',id',
        'phone' => 'required|numeric' 
    ]);

    if($validator->passes()){

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->save();

        session()->flash('success', 'อัพเดทโปรไฟล์สำเร็จ');

        return response()->json([
            'status' => true,
            'errors' => []
        ]);

    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function updateProfilePic(Request $request){
        //dd($request->all());

        $id = Auth::user()->id;

        $validator =Validator::make($request->all(),[
            'image' =>'required|image'
        ]);

        if($validator->passes()){

            $image =$request->image;
            $ext= $image->getClientOriginalExtension();
            $imageName =$id.'-'.time().'.'.$ext;
            $image->move(public_path('/profile_pic/'),$imageName );

            User::where('id',$id)->update(['image'=> $imageName]);
            session()->flash('success','Profile updated successfully');

            return response()->json([
                'status'=> true,
                'errors'=> []
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'errors'=> $validator->errors()
            ]);
        }
    }

    public function creatrJob(){

        $categories = Category::orderBy('name','Asc')->where('status',1)->get();
        $jobTypes = JobType::orderBy('name','Asc')->where('status',1)->get();
        return view('postjob',[
            'categories'=> $categories,
            'jobTypes'=> $jobTypes,
        ]);

    }

    public function saveJob(Request $request){

        $rules = [
            'title'=> 'required|min:5|max:100',
            'category'=> 'required',
            'jobType'=> 'required',
            'vacancy'=> 'required|integer',
            'salary'=> 'required',
            'location'=> 'required',
            'description'=> 'required',
            'company_name'=> 'required'
            

        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()){

           $job = new Job();
           $job->title= $request->title;
           $job->category_id = $request->category;
           $job->job_type_id= $request->jobType;
           $job->vacancy= $request->vacancy;
           $job->salary= $request->salary;
           $job->location= $request->location;
           $job->description= $request->description;
           $job->benefits= $request->benefits; 
           $job->responsibility= $request->responsibility;
           $job->qualifications= $request->qualifications;
           $job->keywoords= $request->keywoords;
           $job->experience= $request->experience;
           $job->company_name= $request->company_name;
           $job->company_location= $request->company_location;
           $job->company_website= $request->company_website;
           $job->save();


           session()->flash('success','งานถูกเพิ่มแล้ว');


           return response()->json([
            'status'=>true,
            'errors'=> []
        ]);


        }else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function myJobs(){
        return view('myjobs');
    }
}
