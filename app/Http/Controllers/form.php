<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Tbl_registration;
use Dirape\Token\Token;
//use Redirect,Response,DB,Config;
use Hash;
use Session;
use DataTable;

class Form extends Controller {

    public function index() {
        
        return view('form');
    }

    public function register(Request $request) {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'ps' => 'required',
            'cps' => 'required|same:ps',
            'gender' => 'required',
            'dob' => 'date|before:today',
            'image'=>'required'
            
                // 'tc' => 'required'
                ]
        );
        
//        echo "<pre>";
//        print_r($request->all());
        $name = time()."-hk.".$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/images/',$name);   
        $tbl_registration = new Tbl_registration;
        $tbl_registration->first_name = $request['fname'];
        $tbl_registration->last_name = $request['lname'];
        $tbl_registration->email = $request['email'];
        $tbl_registration->mobile = $request['mobile'];
        $tbl_registration->password = base64_encode($request['ps']);
        $tbl_registration->gender = $request['gender'];
        $tbl_registration->date_of_birth = $request['dob'];
        $tbl_registration->photo = $name;
        $tbl_registration->token = Str::random(60);
        // $update->register_date = date("Y-m-d h:i:s");
//        DB::connection()->enableQueryLog();
        //  DB::insert('INSERT INTO `tbl_registration` (`register_id`, `first_name`, `last_name`, `email`, `mobile`, `password`, `gender`, `date_of_birth`) VALUES (NULL, 'harshal', 'katrodiya', 'harshal@gmail.com', '9874563210', 'hkbhai@123', 'Male', '2021-12-01');');
        $tbl_registration->save();
        return redirect('view');
    }
    public function view(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $registration = Tbl_registration::where('first_name','LIKE','%{$search}%')->orwhere('last_name','LIKE','%{$search}%')->orwhere('email','LIKE','%{$search}%')->get();
        }
        else
        {
        $registration = Tbl_registration::all();
        }
//        echo "<pre>";
//        print_r($registration);
//        die();
        $data = compact('registration');
        return view('view')->with($data);
    }

    public function delete($id) {
        $del = Tbl_registration::find($id);
        $image_path = public_path('storage/images/'.$del->photo);
//        print_r($del->delete);
//        die;
        if (!is_null($del)) 
        {
             unlink($image_path);
            $del->delete();
            
        }
//        $this->register();
       
        return redirect('view');
    }

    public function edit($id) {
        $edit = Tbl_registration::find($id);
        if (!is_null($edit)) 
        {
//         $url = url('/register/edit/')."/".$id;
            $data = compact('edit');
            return view('update')->with($data);
        } else 
        {
            return redirect('view');
        }
    }

    public function update(Request $req) 
    {
//             $req->validate([
//            'fname' => 'required',
//            'lname' => 'required',
//            'email' => 'required|email',
//            'mobile' => 'required|digits:10',
//            'ps' => 'required',
//            'cps' => 'required|same:ps',
//            'gender' => 'required',
//            'dob' => 'date|before:today',
//                 'tc' => 'required'
//                ]
//        );

        $update = Tbl_registration::find($req->id);
        $update['first_name'] = $req['fname'];
        $update['last_name'] = $req['lname'];
        $update['email'] = $req['email'];
        $update['mobile'] = $req['mobile'];
        $update['password'] = base64_encode($req['ps']);
        $update['gender'] = $req['gender'];
        $update['date_of_birth'] = $req['dob'];
        $update['photo'] = $req['image'];
        $update->save();

        return redirect('view');
    }
    public function log() {
        return view('login');
    }
    public function login(Request $request)
    {
//        print_r('ccc');
//        die;
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
//        print_r('xxx');
//        p($log->validate());
//        die();
//        $tbl_registration = new Tbl_registration;
        $ps = base64_encode($request->password);
        $user = Tbl_registration::where('email','=',$request->email)->where('password','=',$ps)->first();
        
//            p($user);
//            die;
        if($user)
        {
//            if(Hash::check(base64_encode($request->password), $user->password))
//            {
                $request->session()->put('user',$user->id); 
//                p($request->session());
//                die;
                
               return redirect('view');
//            }
//            else
//            {
//                  return back()->with('fail','This Password Is Not Match');
//            }
        }
        else
        {
            return back()->with('fail','This Email Or Password Wrong');
        }
        return view('login');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');  
//        $request->session()->forget();  
        return redirect('login');
    }
    
}
