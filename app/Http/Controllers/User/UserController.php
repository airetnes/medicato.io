<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {


    public function __construct() {
//        (new User())->isAuth();
//        $user = \Auth::check();
//        if (!$user) {
//            redirect('/login');
//        }
//        dd($user);
    }

//    public function index(Request $request) {
//
//        dd($request->all());
//        return view('user.main');
//    }

    public function main() {
        return view('user.main');
    }
    
    public function profile() {
        return view('user.profile');
    }

    public function edit_profile(Request $request) {
        $user = User::find(\Auth::user()->id);
        $this->delete_photo($user);

        $this->validate($request, [
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $stamp = time();
        $request->file('photo')->move(public_path('files/photo'),$stamp);

        $user->photo = $stamp;
        $user->update($request->input());
        return \Redirect::back()->with('success', 'Ваш профиль обновлен!');
    }

    private function delete_photo(User $user) {
        if (!empty($user->photo)) {
            return unlink(public_path('files/photo/' . $user->photo));
        }
        return true;
    }
}
