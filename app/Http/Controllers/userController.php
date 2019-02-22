<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\verifyEmail;
use phpDocumentor\Reflection\Types\Null_;
use JWTAuth;


class userController extends Controller
{



	public function registerUser(Request $request){

			$request->validate([
				'firstname' => 'required|max:20',
				'lastname' => 'required|max:20',
				'email' => 'required|email|unique:users',
				'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password'
            // new rules here
        ]);
/*
    $user=User::create($request->all());

    return ["message"=>"User Created","user"=>$user];
*/



			$table = new User;
			$table->firstname = $request->input('firstname');
			$table->lastname = $request->input('lastname');
			$table->email = $request->input('email');
			$table->password = bcrypt($request->input('password'));
            $table->verifyToken=Str::random(40);

        $table->save();

       // return response()->json(['message'=>$table],201);
        //return redirect('/verifyEmailFirst');

        $thisUser=User::findOrFail($table->id);
        $this->sendEmail($thisUser);

			//return $table;
			return redirect('verifyEmailFirst')->with('responseReg','Verify your email & complete the registration');
	}

    public function sendEmail($thisUser){


        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));


    }

    public function sendEmailDone($email,$verifyToken){
	    $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
	    if($user){
	        user::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>Null]);
            return redirect('http://localhost:8080/loginPage')->with('responseReg','Registration & verification Completed');
        }else{
            return redirect('http://localhost:8080/loginPage')->with('responseVerifyErr','User Not Found');
        }

    }




    public function loginUser(Request $request){

        $data = $request->only('email','password');

        if(!$token=JWTAuth::attempt($data)){
            return ['msg'=>"Not valid creditionals"];   

        }else if(!Auth::user()->status){
            return ['msg'=>"Verify your email first"];            
            
        }
        
        $currentUser = Auth::user();
            return ['token'=>$token,'currentUser'=>$currentUser];
        /*$data = $request->only('email','password','status');
       // $data2 = $request->only('status');


        if(Auth::attempt($data)){
            //redirect()->route
            if (!Auth::user()->status) {
                Auth::logout();
                return redirect('/loginPage')->with('responseLog','Please Verify your Email');
            }
            return ['token'=>$token];
            //return redirect('/logged')->with('responseLog','Logged in Succesfully');

        }
        return "Auth failed";
    //	return redirect('/loginPage')->with('responseLog','Login Failed');
        */
	}


public function getLogged(){
		return view('logged');
	}

public function verifyEmailFirst(){

    return view('email/verifyEmailFirst');
}

    public function loginPage(){
        if(Auth::user()){
            return redirect('/logged');
        }
        return view('loginPage');
    }



	public function registerPage(){
        if(Auth::user()){
            return redirect('/logged');
        }
		return view('registerPage');
	}

public function logoutUser(){
		Auth::logout();
		Session::flush();
		return redirect('/loginPage')->with('responseLogout','Logout Succesfully');
	}


	public function loadProfile(){

	    //$user = user::
    }
}
