<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ListFileController extends Controller
{
    public function index()
    {
        $path = public_path('/file');
        $files = File::allFiles($path);

        // dd($files[1]);

        return view('listfile', ['files' => $files]);
    }

    public function download(Request $request, $name)
    {
        $file = public_path() . "/" . "file/" . $name;

        // $binary = file_get_contents($file);

        // dd($binary);

        $headers = ['Content-Type: application/pdf'];

        // inline for open document directly in the browser
        return response()->download($file, $name, $headers, 'inline');
    }
}
