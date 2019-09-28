<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\Sender;
use App\MailDetail;
use App\MailToPrint;
use App\MailDocument;
use App\MailDocumentTemp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;


class MailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $all_mails = $this->allMails();
//        $today_mails =$this->todayMails();
        $mails = $this->allMails();
        $today_mails = $this->todayMails();
        $month_mails = $this->monthMail();
        return view('mail.index', compact('mails','today_mails', 'month_mails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->mtDelete(Auth::id());

        //generate list of senders
        $senders = Sender::distinct()->get();
//        $senders = Sender::all()->distinct('sender_name');

        //deleting the temp mails

        $mails = Mail::distinct()->get();

        return view('mail.create', compact('senders', 'mails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $mail = new Mail;
        $sender = new Sender;
        $mailDetail = new MailDetail;


        $date = trim($request->input('date')) . ' 00:00:00';
        //$date = '2019-07-12 00:00:00';

        $mail->title = $request->input('title');
        $mail->reference = $request->input('reference');
        $mail->status = "in";
        $mail->date = $date;
        $mail->created_by = Auth::id();
        $mail->created_at = $request->input('created_at');

        $mail->save();

        $mail = Mail::all()->last();
//        check is department exist

        $sender->mail_id = $mail->id;
        $sender->name = $request->input('sender');
        $sender->department = $request->input('department');
        $mail->created_at = $request->input('created_at');
        $sender->save();

        //checking if there is comment in this mail.
        if (!empty($request->input('comment'))) {
//            echo 'Yeah! Comments found';
            /*
             * fetch last sender so that you will use the send to save below*/
            $sender = Sender::all()->last();
            //saving the mail details
            $mailDetail->mail_id = $mail->id;
            $mailDetail->comment = $request->input('comment');
            $mailDetail->received_from = $request->input('from');
            $mailDetail->forwarded_to = $request->input('to');
            $mailDetail->sender_id = $sender->id;
            $mailDetail->created_at = $request->input('created_at');
            $mailDetail->save();
        }

//        echo $check_department;

        //display sender information
//        return $mail;
//                $check_sender = Sender::where('name', '=', $request->input('sender') );

        /*
         * saving the mail documents
         * */
        $docs = MailDocumentTemp::where('user_id', Auth::id())->get();

        /*for($i = 0; $i < sizeof($docs); $i++){
            $mailDocument->mail_id = $mail->id;
            $mailDocument->name = $docs[$i]->name;
            $mailDocument->save();
            print($docs[$i]->name.'<br>');
        }*/

        foreach ($docs as $doc) {
            $mailDocument = new MailDocument;
            $mailDocument->mail_id = $mail->id;
            $mailDocument->name = $doc->name;
            $mailDocument->save();
//            print($doc->name.'<br>');
        }

//        die();
//        dd($docs);

        return $this->createsuccess();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'editing mails';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function incoming()
    {
        $mails = Mail::where('status', '=', 'in')->orderBy('id', 'DESC')->paginate(10);
        return view('mail.incoming', compact('mails'));
    }

    public function outgoing()
    {
        $mails = Mail::where('status', '=', 'out')->orderBy('id', 'DESC')->paginate(10);
        return view('mail.outgoing', compact('mails'));
    }

    public function search(Request $request)
    {
        $mails = Mail::where('title', $request->input('msearch'))
            ->orWhere('title', 'like', '%' . $request->input('msearch') . '%')->get();
        return view('mail.search', compact('mails'));
    }

    public function mtDelete($id)
    {
        //deleting temporary mail docs
        //TODO: replacing this user ID to the session user ID
        MailDocumentTemp::where('user_id', $id)->delete();
    }

// functions::::::::::::
    public function allMails()
    {
        return Mail::orderBy('id', 'DESC')->paginate(10);
    }

    public function todayMails()
    {
        $from = date("Y-m-d") . ' 00:00:00';
        $to = date("Y-m-d") . ' 23:59:59';
        return Mail::whereBetween('created_at', [$from, $to])->orderBy('title', 'asc')->paginate(10);
    }

    public function monthMail()
    {
        $month = date("Y-m");
        return Mail::where('created_at', $month)
        ->orWhere('created_at', 'like', '%' . $month . '%')->paginate(10);
//        return Mail::whereBetween('created_at', [$from, $to])->orderBy('title', 'asc')->get();
    }

    /*public function getIncoming()
    {
        Mail::where('status', '=', 'in')->orderBy('id', 'DESC')->get();
    }

    public function getOutgoing()
    {
        Mail::where('status', '=', 'out')->orderBy('id', 'DESC')->get();
    }*/
    public function createsuccess()
    {
        $mails = $this->allMails();
        return view('/mail/createsuccess', compact('mails'));
    }

    public function getMailDetail($id)
    {
        $mails = Mail::where('id', $id)->get();
        $documents = Mail::find($id)->documents;
        $details = Mail::find($id)->details;
        $sender = Mail::find($id)->sender;
        //        $mail['details'] = $details;
        //        $mail['documents'] = $documents;
        foreach ($mails as $mailDetail) {
            if ($mailDetail->status == 'in') {
                $mailDetail->status = 'Incoming';
            }
            if ($mailDetail->status == 'out') {
                $mailDetail->status = 'Outgoing';
            }
            foreach ($documents as $document) {
                $mailDetail['documents'] = $document;
            }
            foreach ($details as $detail) {
                $mailDetail['details'] = $detail;
            }
            foreach ($sender as $send) {
                $mailDetail['sender'] = $send;
            }
        }
        $mailDetail = $mails;
        return view('mail.get-mail-details', compact('mailDetail'));
    }

    public function getCurrentLocation($id)
    {
        $last = MailDetail::where('mail_id', '=', $id)->orderBy('id', 'DESC')->first();
        return view('mail.get-current-mail-location', compact('last'));
    }

    public function getMailComments($id)
    {
        $comments = DB::table('mails_details')
            ->leftJoin('senders', 'mails_details.sender_id', '=', 'senders.id')
            ->select('mails_details.*', 'senders.name as sender', 'senders.department as department')
            ->where('mails_details.mail_id', '=', $id)
            ->orderBy('mails_details.id', 'DESC')
            ->get();

        /*$sender = Sender::find($id);
        $details = $sender->details()
            ->with('sender') // bring along details of the friend
            ->join('name', 'sender.id', '=', 'mailDetails.mail_id')
            ->get(['sender.*']); // exclude extra details from friends table*/

//        return $users;
//        $comments = MailDetail::where('mail_id', $id)->get();
        return view('mail.get-mail-comments', compact('comments'));
    }

    public function getMailDocuments($id)
    {
        $documents = MailDocument::where('mail_id', '=', $id)->get();
        return view('mail.get-mail-documents', compact('documents'));
    }

    public function saveMailReply(Request $request)
    {
        /*fetching sender of this mail*/
        $sender = Sender::where('mail_id', '=', $request->input('id'))->first();

        $comments = new MailDetail();
        $comments->mail_id = $request->input('id');
        $comments->comment = $request->input('comment');
        $comments->received_from = $request->input('received_from');
        $comments->forwarded_to = $request->input('forwarded_to');
        $comments->sender_id = $sender->id;
        $comments->save();

        /*status*/

        DB::table('mails')
            ->where('id', $request->input('id'))
            ->update(['status' => $request->input('status')]);

        return "Comment/minute saved successful";
    }

    public function printMail()
    {

        $mails = DB::table('mails_to_print')
            ->leftJoin('mails', 'mails.id', '=', 'mails_to_print.mail_id')
            ->join('senders', 'senders.mail_id','=','mails_to_print.mail_id')
            ->select('mails.*','senders.*')
            ->orderBy('mails.id', 'DESC')
            ->get();

        if (count($mails) > 0) {
            return view('mail.print-mail', compact('mails'));
        }

        return 'You have not select any mail.';
    }

    public function print()
    {
        $mails = DB::table('mails_to_print')
            ->leftJoin('mails', 'mails.id', '=', 'mails_to_print.mail_id')
            ->select('mails.*')
            ->orderBy('mails.id', 'DESC')
            ->paginate(10);

//        print('<pre>');
//        print_r($mails);
//        die();
        //        $mails = $this->allMails();

        return view('mail.print', compact('mails'));
    }

    public function selectMail($id)
    {
        //check if already selected
        $mails = MailToPrint::where('mail_id', '=', $id)->first();
//        print($mails->id);
        if (empty($mails->id)) {
            //do nothing
            $mail = new MailToPrint();
            $mail->mail_id = $id;
            $mail->save();
        } else {
            //do nothing
        }

        return $id . ' selected successfully';
    }

    public function deSelectMail($id)
    {
        MailToPrint::where('mail_id', $id)->delete();
//        $mail->delete();
        return $id . ' deselected successfully';
    }

    public function getMonthMail(){
        $month_mails = $this->monthMail();
        return view('mail.month-mail', compact( 'month_mails'));
    }
    public function getTodayMail(){
        $today_mails = $this->todayMails();
        return view('mail.today-mail', compact( 'today_mails'));
    }
}
