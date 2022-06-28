<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index(){
        return view('file');
    }
    
    public function store(Request $request){
        $request->validate([
            'title' => 'required:max:255',
            'overview' => 'required',
          ]);
    
          $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();  
            //   $type = $request->file->getClientMimeType();
          $size = $request->file->getSize();


        //   dd(auth()->id());
        //   dd($fileName , $type , $size);
          $request->file->move(public_path('file'), $fileName);
          File::create([
            'user_id' => Auth::id(),
            'title' => $request->get('title'),
            'overview' => $request->get('overview'),
            'size' => $size,
            'file_name'=>$fileName
          ]);
    
          return back()->with('message', 'Your file is submitted Successfully');
    }
}
