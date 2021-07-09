
    <table class="table table-striped mt-3" border="1">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode</th>
          <th scope="col">Nama</th>
          <th scope="col">Tunjangan Suami Istri</th>
          <th scope="col">Tunjangan Anak</th>
          <th scope="col">Uang Makan</th>
          <th scope="col">Uang Lembur</th>
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
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>