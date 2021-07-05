<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('dashboard');
        return view('login');
    }
    
    public function checkLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        // $users = DB::table('tbl_users')->get();
        
        $pass_encrp = Hash::make('admin');

        $user = DB::table('tbl_users')
            ->join('tbl_roles', 'tbl_users.role_id', '=', 'tbl_roles.id')
            ->select('tbl_users.*', 'tbl_roles.nama AS role')
            ->where('tbl_users.username', '=', $username)->get();

        if ($user->count() != 0) {
            if (Hash::check($password, $user[0]->password)) {
                $request->session()->put('user_login', $user[0]);
                return redirect('/')->with('msg', 'Login berhasil!');
            } else {
                return redirect('/login')->with('msg', 'Password anda salah!');
            }
        } else {
            return redirect('/login')->with('msg', 'Akun belum terdaftar!');
        }
        
        // return $user;
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_login');
        return redirect('/')->with('message', 'Berhasil Logout');
    }
}
