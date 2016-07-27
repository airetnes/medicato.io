<?php

namespace App\Http\Controllers\User;

use App\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::where('from', \Auth::user()->id)
            ->orWhere('to', \Auth::user()->id)
            ->orderBy('created_at')
            ->get();
        return view('user.message', ['messages' => $messages]);
    }

    public function add() {
        if ( \Session::token() !== Input::get( '_token' ) ) {
            return \Response::json([
                'msg' => 'ERROR 404',
                'status' => 'error',
            ]);
        }
        if (Input::get('message') == 1) {
            return \Response::json([
                'msg' => 'ERROR 404',
                'status' => 'error',
            ]);
        }
        $user_id = Input::get( 'user_id' );
        $message = Input::get( 'message' );

        Message::create([
            'to' => (\Auth::user()->id != 1) ? 1 : 45,
            'from' => $user_id,
            'body' => $message
        ]);

        $response = [
            'id' => $user_id,
            'message' => $message,
            'status' => 'success',
        ];

        return \Response::json( $response );
    }

    public function check_new($last_mess_id = null) {
        if (Input::get( 'id' )) {
            $messages = Message::where('id', '>', Input::get( 'id' ))
                ->where(function ($query) {
                    $query->where('from', \Auth::user()->id)
                        ->orWhere('to', \Auth::user()->id);
                })
                ->orderBy('created_at')
                ->get();
            return json_encode($messages);
        }
        return json_encode(1);
    }
}
