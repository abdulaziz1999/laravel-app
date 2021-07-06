@extends('layouts.index')
@section('css')
<style>
  .card-signin {
    border: 0;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  }

  .card-signin .card-title {
    margin-bottom: 2rem;
    font-weight: 300;
    font-size: 1.5rem;
  }

  .card-signin .card-body {
    padding: 2rem;
  }
</style>
@endsection
@section('content')
<div class="card card-signin" style="margin-top: 83px;">
  <div class="card-body">
    <h3 class="display-5">Data Pegawai</h3>
    <a href="{{url('tambah_pegawai')}}" class="btn btn-success" type="submit">Tambah Data</a>
    <table class="table table-striped table-responsive mt-3">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Foto</th>
          <th scope="col">Nama</th>
          <th scope="col">NIK</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Golongan</th>
          <th scope="col">Email</th>
          <th scope="col">No Telp</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Tgl Lahir</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Agama</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pegawai as $item)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>
            <img src="{{ url('assets/images/').'/'.$item->foto }}" alt="Foto">
          </td>
          <td>{{$item->nama}}</td>
          <td>{{$item->nik}}</td>
          <td>{{$item->jabatan}}</td>
          <td>{{$item->golongan}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->no_telp}}</td>
          <td>{{$item->jk}}</td>
          <td>{{$item->tgl_lahir}}</td>
          <td>{{$item->tmp_lahir}}</td>
          <td>{{$item->agama}}</td>
          <td>{{$item->status}}</td>
          <td>
            <a href="{{ url('edit_pegawai/').'/'.$item->id }}" class="btn btn-success">Edit</a>
            <form class="mt-1" method="POST" action="/delete_pegawai">
              @csrf
              <input id="idx" name="idx" type="hidden" value="{{ $item->id  }}">
              <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection