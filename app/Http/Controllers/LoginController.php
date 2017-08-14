<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Training;


class LoginController extends Controller
{
    public $currentUserId;
    public function login(Request $request) {
        
        $this->validate($request, [
            "email" => "required|exists:user,email|email",
            "password" => "required"
        ]);
        $email = $request->email;
        $pass = md5($request->password);

        $check = User::where('email', $email) && User::where('password', $pass)->count();
        // dd($check);

        if($check == false) {
            Session::flash('messagesalah', 'Wrong email or password');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('login');
        }
        $take = User::where('email', $email)->where('password', $pass)->first();
        session(['email' => $take->email]);
        session(['password' => true]);
        $query = User::where('email','=', $email);
        if($query -> count() > 0) {
            $user = $query->select('id_user', 'nama')->first();
            $id = $user['id_user'];
            session(['id_loggedin_user' => $id]);
            // $datasesssion = session()->all();
            // dd($datasesssion);
            // dd(session(['authenticated' => $id]));
            // dd($user);
            // dd($id);
            // $currentuser = $this->getUserId($userarray);
            $trainings = $this->listtraining();
            // dd($trainings);
            return redirect('main')->with('auth', $user);
        }
        Session::flash('messagesalah', 'Wrong email or password');
        Session::flash('alert-class', 'alert-danger'); 
        return redirect('login');
    }

    public function logout() {
        Session::regenerate();
        Session::flush();
        return redirect('login');
    }

    public function listtraining()
    {
        $list = Training::all();
        return view('mcharts', ['list'=>$list]);
    }

}
