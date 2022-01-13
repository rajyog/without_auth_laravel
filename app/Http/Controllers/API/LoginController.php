<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Validator;
//use Illuminate\Support\Facades\Auth;
use Auth;


class LoginController extends BaseController
{
    use HasApiTokens;

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'email' => 'required|email',
            'password' => 'required',

        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
   
            return $this->sendResponse($success, 'Login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
   public function logouts()
   {
       Auth::user()->token()->revoke();
         return response()->json([
         'message' => 'Successfully Logged Out'
    ]);
   }

   }
?>