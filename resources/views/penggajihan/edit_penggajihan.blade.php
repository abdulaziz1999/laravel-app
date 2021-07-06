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
    <h3 class="display-5">Edit Penggajihan</h3>

    <form method="POST" action="/edit_penggajihan" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="date">Tanggal</label>
        <input type="date" name="date" class="form-control" id="date" placeholder="Masukan Tanggal" value="{{ $penggajihan[0]->date }}" required>
      </div>
      <div class="form-group">
        <label for="pegawai_id">Pegawai</label>
        <select id="pegawai_id" name="pegawai_id" class="form-control" required>
          <option >Pilih Pegawai</option>
          @foreach($data['pegawai'] as $item)
          <option value="{{ $item->id }}" @if($item->nama == $penggajihan[0]->pegawai) selected @endif>{{ $item->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="masuk">Masuk</label>
          <input type="number" name="masuk" class="form-control" id="masuk" placeholder="Masukan Jumlah Masuk" value="{{ $penggajihan[0]->masuk }}" required>
        </div>
        <div class="form-group col-md-3">
          <label for="sakit">Sakit</label>
          <input type="number" name="sakit" class="form-control" id="sakit" placeholder="Masukan Jumlah Izin" value="{{ $penggajihan[0]->sakit }}" required>
        </div>
        <div class="form-group col-md-3">
          <label for="izin">Izin</label>
          <input type="number" name="izin" class="form-control" id="izin" placeholder="Masukan Jumlah Izin" value="{{ $penggajihan[0]->izin }}" required>
        </div>
        <div class="form-group col-md-3">
          <label for="alpha">Alpha</label>
          <input type="number" name="alpha" class="form-control" id="alpha" placeholder="Masukan Jumlah Alpha" value="{{ $penggajihan[0]->alpha }}" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="lembur">Lembur</label>
          <input type="number" name="lembur" class="form-control" id="lembur" placeholder="Masukan Jumlah Lembur" value="{{ $penggajihan[0]->lembur }}" required>
        </div>
        <div class="form-group col-md-4">
          <label for="potongan">Potongan</label>
          <input type="number" name="potongan" class="form-control" id="potongan" placeholder="Masukan Jumlah Potongan" value="{{ $penggajihan[0]->potongan }}" required>
        </div>
        <div class="form-group col-md-2">
          <label for="total_gaji_diterima">Gaji Diterima</label>
          <input type="number" name="total_gaji_diterima" class="form-control" id="total_gaji_diterima" placeholder="Masukan Jumlah Gaji Diterima" value="{{ $penggajihan[0]->total_gaji_diterima }}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="ket">Keterangan</label>
        <textarea class="form-control" name="ket" id="ket" rows="3" placeholder="Masukan Keterangan">{{ $penggajihan[0]->ket }}</textarea>
      </div>
      <input id="idx" name="idx" type="hidden" value="{{ $penggajihan[0]->id  }}">
      <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Edit</button>
    </form>
  </div>
</div>
@endsection