<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
class PegawaiController extends Controller
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

        $pegawai = DB::table('tbl_pegawai')
            ->join('tbl_golongan', 'tbl_pegawai.golongan_id', '=', 'tbl_golongan.id')
            ->join('tbl_jabatan', 'tbl_pegawai.jabatan_id', '=', 'tbl_jabatan.id')
            ->select('tbl_pegawai.*', 'tbl_golongan.nama AS golongan', 'tbl_jabatan.nama AS jabatan')
            ->get();

        return view('pegawai.pegawai', ['user_login' => $user_login, 'pegawai' => $pegawai]);
    }

    public function add_page()
    {
        $data = null;
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        $data['agama'] = ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
        $data['status'] = ['Menikah', 'Belum Menikah'];
        $data['jabatan'] = DB::table('tbl_jabatan')
            ->select('id', 'kode', 'nama')
            ->get();
        $data['golongan'] = DB::table('tbl_golongan')
            ->select('id', 'kode', 'nama')
            ->get();

        return view('pegawai.add_pegawai', ['user_login' => $user_login, 'data' => $data]);
        // return json_encode($data);
    }

    public function edit_page($id_pegawai)
    {
        $data = null;
        $user_login = session()->has('user_login');
        if ($user_login) {
            $user_login = session()->get('user_login', null);
        }

        $data['agama'] = ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
        $data['status'] = ['Menikah', 'Belum Menikah'];
        $data['jabatan'] = DB::table('tbl_jabatan')
            ->select('id', 'kode', 'nama')
            ->get();
        $data['golongan'] = DB::table('tbl_golongan')
            ->select('id', 'kode', 'nama')
            ->get();


        $pegawai = DB::table('tbl_pegawai')
            ->join('tbl_golongan', 'tbl_pegawai.golongan_id', '=', 'tbl_golongan.id')
            ->join('tbl_jabatan', 'tbl_pegawai.jabatan_id', '=', 'tbl_jabatan.id')
            ->select('tbl_pegawai.*', 'tbl_golongan.nama AS golongan', 'tbl_jabatan.nama AS jabatan')
            ->where('tbl_pegawai.id', '=', $id_pegawai)->get();



        return view('pegawai.edit_pegawai', ['user_login' => $user_login, 'data' => $data, 'pegawai' => $pegawai]);
        // return json_encode($data);
    }

    public function add_pegawai(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $jk = $request->input('jk');
        $agama = $request->input('jabatan');

        $foto = $request->file('foto');
        $destinationPath = public_path('/assets/images');
        $img_foto = $foto->getClientOriginalName();
        $foto->move($destinationPath, $img_foto);

        DB::table('tbl_pegawai')->insert([
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
            'jk' => $request->input('jk'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'tmp_lahir' => $request->input('tmp_lahir'),
            'agama' => $request->input('agama'),
            'status' => $request->input('status'),
            'foto' => $img_foto,
            'jabatan_id' => $request->input('jabatan'),
            'golongan_id' => $request->input('golongan'),
        ]);


        return redirect('/pegawai')->with('msg', 'Berhasil Tambah Data!');
        // return view('add_pegawai');
    }

    public function edit_pegawai(Request $request)
    {

        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $jk = $request->input('jk');
        $agama = $request->input('jabatan');
        $id_pegawai = $request->input('idx');

        $foto = $request->file('foto');

        if ($foto != null) {
            $destinationPath = public_path('/assets/images');
            $img_foto = $foto->getClientOriginalName();
            $foto->move($destinationPath, $img_foto);

            DB::table('tbl_pegawai')->where('id', $id_pegawai)->update([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'no_telp' => $request->input('no_telp'),
                'jk' => $request->input('jk'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'tmp_lahir' => $request->input('tmp_lahir'),
                'agama' => $request->input('agama'),
                'status' => $request->input('status'),
                'foto' => $img_foto,
                'jabatan_id' => $request->input('jabatan'),
                'golongan_id' => $request->input('golongan'),
            ]);

            return redirect('/pegawai')->with('msg', 'Berhasil Edit Data!');
        } else {
            DB::table('tbl_pegawai')->where('id', $id_pegawai)->update([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'email' => $request->input('email'),
                'no_telp' => $request->input('no_telp'),
                'jk' => $request->input('jk'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'tmp_lahir' => $request->input('tmp_lahir'),
                'agama' => $request->input('agama'),
                'status' => $request->input('status'),
                'jabatan_id' => $request->input('jabatan'),
                'golongan_id' => $request->input('golongan'),
            ]);
            return redirect('/pegawai')->with('msg', 'Berhasil Edit Data!');
        }


        // return view('add_pegawai');
    }


    public function delete_pegawai(Request $request)
    {

        $id_pegawai = $request->input('idx');
        DB::table('tbl_pegawai')->where('id', $id_pegawai)->delete();
        
        return redirect('/pegawai')->with('msg', 'Berhasil Edit Data!');



        // return view('add_pegawai');
    }

    public function pegawaiPDF()
    {
        
        $pegawai = DB::table('tbl_pegawai')
            ->join('tbl_golongan', 'tbl_pegawai.golongan_id', '=', 'tbl_golongan.id')
            ->join('tbl_jabatan', 'tbl_pegawai.jabatan_id', '=', 'tbl_jabatan.id')
            ->select('tbl_pegawai.*', 'tbl_golongan.nama AS golongan', 'tbl_jabatan.nama AS jabatan')
            ->get();
          
        $pdf = PDF::loadView('pegawai.pegawaiPdf', ['pegawai' => $pegawai]);
    
        return $pdf->download('Pegawai.pdf');
    }
}
