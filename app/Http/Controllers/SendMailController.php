<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class SendMailController extends Controller
{
    //
    public function send(){
        $details = [
            'title'=>'Email saya',
            'body'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At assumenda delectus similique deleniti debitis fugiat repellat libero voluptates explicabo quae?'

        ];
        try{
            Mail::to('tommy@twibbonize.com')->send(new TestMail($details));
            echo "Email Berhasil Dikirim";
        }catch(Exception $e){
            echo "Email Gagal Dikirim";
        }
    }
}
