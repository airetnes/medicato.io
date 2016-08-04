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
        $contents['messages'] = $messages;
        return view('user.message', $contents);
    }

    public function add() {
        if ( \Session::token() !== Input::get( '_token' ) ) {
            return \Response::json([
                'msg' => 'ERROR 404',
                'status' => 'error',
            ]);
        }
        $user_id = Input::get( 'user_id' );
        $message = Input::get( 'message' );
        $created_at = Input::get('created_at');
        $user_name = Input::get('user_name');

        Message::create([
            'to' => 1,
            'from' => $user_id,
            'body' => $message,
            'parent_id' => $user_id
        ]);

        $response = [
            'user_id' => $user_id,
            'message' => $message,
            'created_at' => $created_at,
            'user_name' => $user_name,
            'new_count_message' => count(Message::CountNewMessage()),
            'status' => 'success'
        ];

        return \Response::json( $response );
    }
}
