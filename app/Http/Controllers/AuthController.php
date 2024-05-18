<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function dashboard(){
        if(session("userData")){
            return view('admin/dashboard');
        }else{
            return redirect('login')->with("error","Login first !!");
        }

    }
    public function preLogin(){
        if(session("userData") != null){
            return redirect("dashboard");
        }else{

            return view('admin/login');
        }
        
    }
    public function login(Request $request){
        // echo "checker";
        $email = $request["email"]; // $request["email]
        $password = $request["password"];
        // echo $email . "  " . $password ."";

        // $user = User::all();   // select * from user
        //login query      (  select * from user where email = $email and password = $password    )

        $user = User::where("email",$email)->where("password",$password)->first();

        if($user){
            session(["userData"=>$user]);
            return redirect("dashboard")->with("success","Successfully Login");
        }else{
            return redirect()->back()->with("error","Invalid credentials");
        }

        // echo $user;
    }
    public function logout(){
        session()->forget("userData");
        return redirect('login')->with("success","Logged out successfully");
    }
}
