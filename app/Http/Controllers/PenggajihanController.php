<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggajihanController extends Controller
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

        $penggajihan = DB::table('tbl_penggajihan')
            ->join('tbl_pegawai', 'tbl_penggajihan.pegawai_id', '=', 'tbl_pegawai.id')
            ->select('tbl_penggajihan.*', 'tbl_pegawai.nama AS pegawai')
            ->get();

        return view('penggajihan.penggajihan', ['user_login' => $user_login, 'penggajihan' => $penggajihan]);
        // return json_encode($penggajihan);
    }

    public function add_page()
    {
        $data = null;
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        $data['pegawai'] = DB::table('tbl_pegawai')
            ->select('id', 'nama')
            ->get();

        return view('penggajihan.add_penggajihan', ['user_login' => $user_login, 'data' => $data]);
        // return json_encode($data);
    }

    public function edit_page($id_penggajihan)
    {
        $data = null;
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        $data['pegawai'] = DB::table('tbl_pegawai')
            ->select('id', 'nama')
            ->get();


        $penggajihan = DB::table('tbl_penggajihan')
            ->join('tbl_pegawai', 'tbl_penggajihan.pegawai_id', '=', 'tbl_pegawai.id')
            ->select('tbl_penggajihan.*', 'tbl_pegawai.nama AS pegawai')
            ->where('tbl_penggajihan.id', '=', $id_penggajihan)->get();



        return view('penggajihan.edit_penggajihan', ['user_login' => $user_login, 'data' => $data, 'penggajihan' => $penggajihan]);
        // return json_encode($penggajihan);
    }

    public function add_penggajihan(Request $request)
    {
        

        DB::table('tbl_penggajihan')->insert([
            'date' => $request->input('date'),
            'pegawai_id' => $request->input('pegawai_id'),
            'masuk' => $request->input('masuk'),
            'sakit' => $request->input('sakit'),
            'izin' => $request->input('izin'),
            'alpha' => $request->input('alpha'),
            'lembur' => $request->input('lembur'),
            'potongan' => $request->input('potongan'),
            'total_gaji_diterima' => $request->input('total_gaji_diterima'),
            'ket' => $request->input('ket'),
        ]);


        return redirect('/penggajihan')->with('msg', 'Berhasil Tambah Data!');
        // return view('add_pegawai');
    }

    public function edit_penggajihan(Request $request)
    {

        $id_penggajihan = $request->input('idx');

        DB::table('tbl_penggajihan')->where('id', $id_penggajihan)->update([
            'date' => $request->input('date'),
            'pegawai_id' => $request->input('pegawai_id'),
            'masuk' => $request->input('masuk'),
            'sakit' => $request->input('sakit'),
            'izin' => $request->input('izin'),
            'alpha' => $request->input('alpha'),
            'lembur' => $request->input('lembur'),
            'potongan' => $request->input('potongan'),
            'total_gaji_diterima' => $request->input('total_gaji_diterima'),
            'ket' => $request->input('ket'),
        ]);    

        return redirect('/penggajihan')->with('msg', 'Berhasil Edit Data!');
        
        // return view('add_pegawai');
    }


    public function delete_penggajihan(Request $request)
    {

        $id_penggajihan = $request->input('idx');
        DB::table('tbl_penggajihan')->where('id', $id_penggajihan)->delete();
        
        return redirect('/penggajihan')->with('msg', 'Berhasil Edit Data!');



        // return view('add_pegawai');
    }
}
