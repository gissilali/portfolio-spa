<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
    	$this->validateRequest($request);
    	$this->attemptLogin($request);
        if($this->authenticated()){
            return response()->json([
                'loggedIn' => true,
                'user' => Auth::user()
            ]);
        }
    }

    public function validateRequest(Request $request){
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    }

    public function attemptLogin(Request $request){
    	if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'] ])) {
            $this->authenticated();
        } else {
        	$this->sendFailureResponse();
        }
    }

    public function sendSuccessResponse(){
    	
    }

    public function sendFailureResponse(){

    }

    public function authenticated(){
    	if (Auth::check()) {
    		return true;
    	} else {
    		return false;
    	}
    }

    public function logout(){
    	Auth::logout();
        return response()->json([
            'loggedIn' => false,
            'user' => NULL
        ]);
    }
}
