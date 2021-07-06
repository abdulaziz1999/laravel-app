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
    <h3 class="display-5">Edit Jabatan</h3>

    <form method="POST" action="/edit_jabatan" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" name="kode" class="form-control" id="kode" placeholder="Masukan Kode Jabatan" value="{{ $jabatan[0]->kode }}" required>
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Jabatan" value="{{ $jabatan[0]->nama }}" required>
      </div>
      <div class="form-group">
        <label for="gapok">Gapok</label>
        <input type="number" name="gapok" class="form-control" id="gapok" placeholder="Masukan Gajih Pokok" value="{{ $jabatan[0]->gapok }}" required>
      </div>
      <div class="form-group">
        <label for="tunjangan_jabatan">Tunjangan Jabatan</label>
        <input type="number" name="tunjangan_jabatan" class="form-control" id="tunjangan_jabatan" placeholder="Masukan Tunjangan Jabatan" value="{{ $jabatan[0]->tunjangan_jabatan }}" required>
      </div>
      <input id="idx" name="idx" type="hidden" value="{{ $jabatan[0]->id  }}">
      <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Edit</button>
    </form>
  </div>
</div>
@endsection