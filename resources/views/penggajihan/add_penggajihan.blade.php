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
    <h3 class="display-5">Tambah Penggajihan</h3>

    <form method="POST" action="/tambah_penggajihan" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="date">Tanggal</label>
        <input type="date" name="date" class="form-control" id="date" placeholder="Masukan Tanggal" required>
      </div>
      <div class="form-group">
        <label for="pegawai_id">Pegawai</label>
        <select id="pegawai_id" name="pegawai_id" class="form-control" required>
          <option selected>Pilih Pegawai</option>
          @foreach($data['pegawai'] as $item)
          <option value="{{ $item->id }}" >{{ $item->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="masuk">Masuk</label>
          <input type="number" name="masuk" class="form-control" id="masuk" placeholder="Masukan Jumlah Masuk" required>
        </div>
        <div class="form-group col-md-3">
          <label for="sakit">Sakit</label>
          <input type="number" name="sakit" class="form-control" id="sakit" placeholder="Masukan Jumlah Izin" required>
        </div>
        <div class="form-group col-md-3">
          <label for="izin">Izin</label>
          <input type="number" name="izin" class="form-control" id="izin" placeholder="Masukan Jumlah Izin" required>
        </div>
        <div class="form-group col-md-3">
          <label for="alpha">Alpha</label>
          <input type="number" name="alpha" class="form-control" id="alpha" placeholder="Masukan Jumlah Alpha" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="lembur">Lembur</label>
          <input type="number" name="lembur" class="form-control" id="lembur" placeholder="Masukan Jumlah Lembur" required>
        </div>
        <div class="form-group col-md-4">
          <label for="potongan">Potongan</label>
          <input type="number" name="potongan" class="form-control" id="potongan" placeholder="Masukan Jumlah Potongan" required>
        </div>
        <div class="form-group col-md-2">
          <label for="total_gaji_diterima">Gaji Diterima</label>
          <input type="number" name="total_gaji_diterima" class="form-control" id="total_gaji_diterima" placeholder="Masukan Jumlah Gaji Diterima" required>
        </div>
      </div>
      <div class="form-group">
        <label for="ket">Keterangan</label>
        <textarea class="form-control" name="ket" id="ket" rows="3" placeholder="Masukan Keterangan"></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Tambah</button>
    </form>
  </div>
</div>
@endsection