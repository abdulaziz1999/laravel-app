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
    <h3 class="display-5">Data Golongan</h3>
    <a href="{{url('tambah_golongan')}}" class="btn btn-success" type="submit">Tambah Data</a>
    <a href="{{url('golonganpdf')}}" class="btn btn-danger" >Export Pdf</a>
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode</th>
          <th scope="col">Nama</th>
          <th scope="col">Tunjangan Suami Istri</th>
          <th scope="col">Tunjangan Anak</th>
          <th scope="col">Uang Makan</th>
          <th scope="col">Uang Lembur</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($golongan as $item)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$item->kode}}</td>
          <td>{{$item->nama}}</td>
          <td>{{$item->tunjangan_suami_istri}}</td>
          <td>{{$item->tunjangan_anak}}</td>
          <td>{{$item->uang_makan}}</td>
          <td>{{$item->uang_lembur}}</td>
          <td>
            <a href="{{ url('edit_golongan/').'/'.$item->id }}" class="btn btn-success">Edit</a>
            <form class="mt-1" method="POST" action="/delete_golongan">
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