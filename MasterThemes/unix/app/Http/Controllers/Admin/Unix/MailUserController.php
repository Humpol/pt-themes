<?php

namespace Pterodactyl\Http\Controllers\Admin\Unix;

use Illuminate\View\View;
use Pterodactyl\Http\Controllers\Controller;
use Mail;


class MailUserController extends Controller
{

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the admin index view.
     */
    public function index()
    {
        return view('admin.unix.mail');
    }

    public function send()
    {
        if(isset($_POST['receiver']))
        {
        $this->EmailUser($_POST['receiver'], $_POST['name'], $_POST['intro'], $_POST['outro'], $_POST['button_name'], $_POST['button_url']);
        return redirect()->back();
        } else {
            return redirect()->back();
        }
    }




    public function EmailUser($receiver, $name, $intro, $outro, $button_name, $button_url)
    {
        $this->receiver = $receiver;
        $this->name = $name;
        $this->sender = config('mail.from.address');
        $this->sender_name = config('mail.from.name');

        $data = array( 
        'name' => $name,  
        'intro' => $intro,
        'outro' => $outro,
        'button_name' => $button_name,
        'button_url' => $button_url,
        );

        Mail::send('templates.mails.mail', $data, function($message) {
        $message->to( $this->receiver, $this->name )->subject
        (config('mail.from.name'));
        
        $message->from($this->sender, $this->sender_name);
        });
    }
}
