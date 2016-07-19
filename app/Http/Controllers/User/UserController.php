<?php

namespace App\Http\Controllers\User;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

const ROLE_USER = '1';
const ROLE_DOCTOR = '2';

class UserController extends Controller
{


    public function __construct() {
//        (new User())->isAuth();
//        $user = \Auth::check();
//        if (!$user) {
//            redirect('/login');
//        }
//        dd($user);
    }

    public function index() {
        $user = \Auth::user();
        $role = $user->getRoleName($user->role_id);
        
        return view('user.main', [
            'user' => $user,
            'role' => $role
        ]);
    }
}
