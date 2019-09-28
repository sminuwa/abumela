<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\MailDocumentTemp;

class DocumentUploadWithAjaxController extends Controller
{
    public function ajaxImage(Request $request)
    {

        if ($request->isMethod('get'))
            return view('mail.create');
        else {
            $validator = Validator::make($request->all(),
                [
                    'file' => 'image',
                ],
                [
                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
                );
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = $request->file('file')->getClientOriginalName();
            $dir = 'mails/';
            /*$filename = uniqid() . '_' . time() . '.' . $extension;*/
            $filename =  time() . '_' . $name;
            $request->file('file')->move($dir, $filename);

            $mail = new MailDocumentTemp();
            $mail->name = $filename;
            $mail->user_id = Auth::id();
            $mail->save();



            $previews = MailDocumentTemp::where('user_id', Auth::id())->get();
            return view('mail.mail_upload_response', compact('previews'));
        }
    }

    public function ajaxImage1(Request $request)
    {

        if ($request->isMethod('get'))
            return view('mail.create');
        else {
            $validator = Validator::make($request->all(),
                [
                    'file' => 'image',
                ],
                [
                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
                );
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = $request->file('file')->getClientOriginalName();
            $dir = 'mails/';
            /*$filename = uniqid() . '_' . time() . '.' . $extension;*/
            $filename =  time() . '_' . $name;
            $request->file('file')->move($dir, $filename);

            $mail = new MailDocumentTemp();
            $mail->name = $filename;
            $mail->user_id = Auth::id();
            $mail->save();



            $previews = MailDocumentTemp::where('user_id', Auth::id())->get();
            return view('mail.mail_upload_response', compact('previews'));
        }
    }

    public function deleteImage($filename)
    {
        File::delete('mails/' . $filename);
    }
}
