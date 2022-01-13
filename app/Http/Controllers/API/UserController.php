<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends BaseController
{
    public function Userlist(Type $var = null)
    {
        $user = User::all();
        return $this->sendResponse($user, 'User List.');
    }
    public function update(Request $request,$id)
    {
        $post = auth()->user()->posts()->find($id);
 
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }
 
        $updated = $post->fill($request->all())->save();
 
          if ($updated)
          {
            return response()->json([
                'success' => true
             ]);
          }
            else
            {
             return response()->json([
                'success' => false,
                'message' => 'Post can not be updated'
            ], 500);
            }
    }
}
?>