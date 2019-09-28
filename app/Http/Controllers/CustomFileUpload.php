<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomFileUpload extends Controller
{
    //
    public function file(Request $request)
    {
        $file_location = $request->file('img')
            ->store('uploads/mails');

        $file_size = storage::size($file_location);

        function get_file_size($size)
        {
            $k = 1000 * 1;
            $m = 1000 ** 2;
            $g = 1000 ** 3;
            $t = 1000 ** 4;

            if ($size < $k) {
                $size = round($size) . 'B';
            }
            if ($size >= $k && $size < $m) {
                $size = ($size / $k);
                $size = round($size,2) . 'K';
            }
            if ($size >= $m && $size < $g) {
                $size = ($size / $m);
                $size = round($size,2) . 'M';
            }
            if ($size >= $g && $size < $t) {
                $size = ($size / $g);
                $size = round($size,2) . 'T';
            }

            return $size;

        }


        echo get_file_size($file_size);
    }

    public function index()
    {
        return view('customFileUpload');
    }
}
