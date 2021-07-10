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
    <h3 class="display-5">Data Penggajihan Pegawai</h3>
    <a href="{{url('tambah_penggajihan')}}" class="btn btn-success" type="submit">Tambah Data</a>
    <a href="{{url('gajipdf')}}" class="btn btn-danger" >Export Pdf</a>
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Date</th>
          <th scope="col">Pegawai</th>
          <th scope="col">Masuk</th>
          <th scope="col">Sakit</th>
          <th scope="col">Izin</th>
          <th scope="col">Alpha</th>
          <th scope="col">Lembur</th>
          <th scope="col">Potongan</th>
          <th scope="col">Total Gaji Diterima</th>
          <th scope="col">Ket</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($penggajihan as $item)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$item->date}}</td>
          <td>{{$item->pegawai}}</td>
          <td>{{$item->masuk}}</td>
          <td>{{$item->sakit}}</td>
          <td>{{$item->izin}}</td>
          <td>{{$item->alpha}}</td>
          <td>{{$item->lembur}}</td>
          <td>{{$item->potongan}}</td>
          <td>{{$item->total_gaji_diterima}}</td>
          <td>{{$item->ket}}</td>
          <td>
            <a href="{{ url('edit_penggajihan/').'/'.$item->id }}" class="btn btn-success">Edit</a>
            <form class="mt-1" method="POST" action="/delete_penggajihan">
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