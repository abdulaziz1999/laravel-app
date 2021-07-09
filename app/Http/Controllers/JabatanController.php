<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        $jabatan = DB::table('tbl_jabatan')
            ->select('*')
            ->get();

        return view('jabatan.jabatan', ['user_login' => $user_login, 'jabatan' => $jabatan]);
    }

    public function add_page()
    {
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        return view('jabatan.add_jabatan', ['user_login' => $user_login,]);
        // return json_encode($data);
    }

    public function edit_page($id_jabatan)
    {
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        $jabatan = DB::table('tbl_jabatan')
            ->select('*')
            ->where('id', '=', $id_jabatan)->get();



        return view('jabatan.edit_jabatan', ['user_login' => $user_login, 'jabatan' => $jabatan]);
        // return json_encode($data);
    }

    public function add_jabatan(Request $request)
    {

        DB::table('tbl_jabatan')->insert([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
            'gapok' => $request->input('gapok'),
            'tunjangan_jabatan' => $request->input('tunjangan_jabatan'),
        ]);


        return redirect('/jabatan')->with('msg', 'Berhasil Tambah Data!');
        // return view('add_pegawai');
    }

    public function edit_jabatan(Request $request)
    {
        $id_jabatan = $request->input('idx');

        DB::table('tbl_jabatan')->where('id', $id_jabatan)->update([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
            'gapok' => $request->input('gapok'),
            'tunjangan_jabatan' => $request->input('tunjangan_jabatan'),
        ]);

        return redirect('/jabatan')->with('msg', 'Berhasil Tambah Data!');
        // return view('add_pegawai');
    }


    public function delete_jabatan(Request $request)
    {

        $id_pegawai = $request->input('idx');
        DB::table('tbl_jabatan')->where('id', $id_pegawai)->delete();
        
        return redirect('/jabatan')->with('msg', 'Berhasil Edit Data!');



        // return view('add_pegawai');
    }

    public function jabatanPDF()
    {
        
        $jabatan = DB::table('tbl_jabatan')
            ->select('*')
            ->get();
          
        $pdf = PDF::loadView('jabatan.jabatanPdf', ['jabatan' => $jabatan]);
    
        return $pdf->download('Jabatan.pdf');
    }
}
