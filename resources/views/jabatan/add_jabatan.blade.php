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
    <h3 class="display-5">Tambah Jabatan</h3>

    <form method="POST" action="/tambah_jabatan" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" name="kode" class="form-control" id="kode" placeholder="Masukan Kode Jabatan" required>
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Jabatan" required>
      </div>
      <div class="form-group">
        <label for="gapok">Gapok</label>
        <input type="number" name="gapok" class="form-control" id="gapok" placeholder="Masukan Gajih Pokok" required>
      </div>
      <div class="form-group">
        <label for="tunjangan_jabatan">Tunjangan Jabatan</label>
        <input type="number" name="tunjangan_jabatan" class="form-control" id="tunjangan_jabatan" placeholder="Masukan Tunjangan Jabatan" required>
      </div>

      <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Tambah</button>
    </form>
  </div>
</div>
@endsection