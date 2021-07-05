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
    <h3 class="display-5">Edit Pegawai</h3>

    <form method="POST" action="/edit_pegawai" enctype="multipart/form-data">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">NIK</label>
          <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK" value="{{$pegawai[0]->nik}}" required>
        </div>
        <div class="form-group col-md-6">
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" value="{{$pegawai[0]->nama}}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email" value="{{$pegawai[0]->email}}" required>
        </div>
        <div class="form-group col-md-8">
          <label for="no_telp">No Telp</label>
          <input type="number" name="no_telp" class="form-control" id="no_telp" placeholder="Masukan No Telepon" value="{{$pegawai[0]->no_telp}}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <select id="jk" name="jk" class="form-control" required>
          <option >Pilih Jenis Kelamin</option>
          <option value="L" @if("L" == $pegawai[0]->jk) selected @endif>Laki-Laki</option>
          <option value="P" @if("P" == $pegawai[0]->jk) selected @endif>Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Masukan Tanggal Lahir" value="{{$pegawai[0]->tgl_lahir}}" required>
      </div>
      <div class="form-group">
        <label for="tmp_lahir">Tempat Lahir</label>
        <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" placeholder="Masukan Tempat Lahir" value="{{$pegawai[0]->tmp_lahir}}" required>
      </div>
      <div class="form-group">
        <label for="agama">Agama</label>
        <select id="agama" name="agama" class="form-control" required>
          <option>Pilih Agama</option>

          @foreach($data['agama'] as $item)
          <option @if($item == $pegawai[0]->agama) selected @endif>{{ $item }}</option>
          @endforeach

        </select>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="status">Status</label>
          <select id="status" name="status" class="form-control" required>
            <option >Pilih Status</option>
            @foreach($data['status'] as $item)
            <option @if($item == $pegawai[0]->status) selected @endif>{{ $item }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="jabatan">Jabatan</label>
          <select id="jabatan" name="jabatan" class="form-control" required>
            <option >Pilih Jabatan</option>
            @foreach($data['jabatan'] as $item)
            <option value="{{ $item->id }}" @if($item->nama == $pegawai[0]->jabatan) selected @endif >{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="golongan">Golongan</label>
          <select id="golongan" name="golongan" class="form-control" required>
            <option selected>Pilih Golongan</option>
            @foreach($data['golongan'] as $item)
            <option value="{{ $item->id }}" @if($item->nama == $pegawai[0]->golongan) selected @endif>{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="foto">Foto</label>
        <input type="file" name="foto" class="form-control" id="foto" accept="image/x-png,image/gif,image/jpeg" placeholder="Pilih Foto" value="fd">
        <img src="{{ url('assets/images/').'/'.$pegawai[0]->foto }}" alt="Foto">
      </div>
      <input id="idx" name="idx" type="hidden" value="{{ $pegawai[0]->id  }}">
      <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Edit</button>
    </form>
  </div>
</div>
@endsection