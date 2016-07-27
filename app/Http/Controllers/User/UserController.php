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

        $this->validate($request, [
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
        ]);

        $user = User::find(\Auth::user()->id);
        $user->update([
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
        return \Redirect::back()->with('success', 'Ваш профиль обновлен!');
    }

    public function edit_password(Request $request) {

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(\Auth::user()->id);

        if (\Hash::check($request->input('old_password'), $user->password)) {
            $user->update([
                'password' => bcrypt($request->input('new_password')),
            ]);
            return \Redirect::back()->with('success', 'Пароль успешно изменен!');
        } else {
            return \Redirect::back()->withErrors('Не правильно указан текущий пароль!');
        }
    }

    public function change_photo(Request $request) {
        if ($request->file('photo')) {
            $user = User::find(\Auth::user()->id);
            $this->delete_previous_photo($user);
            $stamp = time();
            $request->file('photo')->move(public_path('files/photo'),$stamp);
            $user->photo = $stamp;
            $user->update();
            return \Redirect::back()->with('success', 'Фото профиля обновлено!');
        } else {
            return \Redirect::back()->withErrors('Неизвестная ошибка при загрузке фотографии. Обратитесь к администратору.');
        }
    }

    public function delete_photo() {

        $user = User::find(\Auth::user()->id);
        if ($user->photo) {
            $this->delete_previous_photo($user);
            $user->update(['photo' => '']);
            return \Redirect::back()->with('success', 'Фото удалено!');
        } else {
            return \Redirect::back()->withErrors('Неизвестная ошибка. Обратитесь к администратору.');
        }
    }

    private function delete_previous_photo(User $user) {
        if (!empty($user->photo)) {
            if (\File::isFile(public_path('files/photo/' . $user->photo))) {
                return unlink(public_path('files/photo/' . $user->photo));
            }
        }
        return true;
    }
}
