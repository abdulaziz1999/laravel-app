<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
class GolonganController extends Controller
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

        $golongan = DB::table('tbl_golongan')
            ->select('*')
            ->get();

        return view('golongan.golongan', ['user_login' => $user_login, 'golongan' => $golongan]);
    }

    public function add_page()
    {
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        return view('golongan.add_golongan', ['user_login' => $user_login]);
        // return json_encode($data);
    }

    public function edit_page($id_golongan)
    {
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        $golongan = DB::table('tbl_golongan')
            ->select('*')
            ->where('id', '=', $id_golongan)->get();



        return view('golongan.edit_golongan', ['user_login' => $user_login, 'golongan' => $golongan]);
        // return json_encode($data);
    }

    public function add_golongan(Request $request)
    {

        DB::table('tbl_golongan')->insert([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
            'tunjangan_suami_istri' => $request->input('tunjangan_suami_istri'),
            'tunjangan_anak' => $request->input('tunjangan_anak'),
            'uang_makan' => $request->input('uang_makan'),
            'uang_lembur' => $request->input('uang_lembur'),
        ]);


        return redirect('/golongan')->with('msg', 'Berhasil Tambah Data!');
        // return view('add_pegawai');
    }

    public function edit_golongan(Request $request)
    {
        $id_golongan = $request->input('idx');

        DB::table('tbl_golongan')->where('id', $id_golongan)->update([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
            'tunjangan_suami_istri' => $request->input('tunjangan_suami_istri'),
            'tunjangan_anak' => $request->input('tunjangan_anak'),
            'uang_makan' => $request->input('uang_makan'),
            'uang_lembur' => $request->input('uang_lembur'),
        ]);

        return redirect('/golongan')->with('msg', 'Berhasil Tambah Data!');
        // return view('add_pegawai');
    }


    public function delete_golongan(Request $request)
    {

        $id_golongan = $request->input('idx');
        DB::table('tbl_golongan')->where('id', $id_golongan)->delete();
        
        return redirect('/golongan')->with('msg', 'Berhasil Edit Data!');



        // return view('add_pegawai');
    }

    public function golonganPDF()
    {
        
        $golongan = DB::table('tbl_golongan')
            ->select('*')
            ->get();
          
        $pdf = PDF::loadView('golongan.golonganPdf', ['golongan' => $golongan]);
    
        return $pdf->download('Golongan.pdf');
    }
}
