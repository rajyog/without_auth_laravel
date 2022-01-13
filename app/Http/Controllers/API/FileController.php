<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\File;
use Validator;
use Illuminate\Http\Request;
class FileController extends Controller
{
    public function upload(Request $request)
    {
 
       $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:pdf,jpg,png,jeif|max:2048',
        ]);   
 
        if($validator->fails()) {          
            
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
 
         
        if ($file = $request->file('file')) 
        {
            $path = $file->store('files');
            $name = $file->getClientOriginalName();
 
            //store your file into directory and db
            $save = new File();
            $save->name = $name;
            $save->path= $path;
            $save->save();
              
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
        }
    }
    public function view() 
    {
        $view = File::all();
        $vi = compact('view');
       return view('viewphoto')->with($vi);  
    }
}
?>