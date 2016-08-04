<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function main() {
        $messages = Message::where('to', \Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('from');
        $contents['messages'] = $messages;
        return view('admin.messages', $contents);
    }

    public function message( $id ) {
        $messages = Message::where('parent_id', $id)
            ->orderBy('created_at')
            ->get();
        return view('admin.message', ['messages' => $messages]);
    }
}
