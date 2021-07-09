    <table class="table table-striped mt-3" border="1">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode</th>
          <th scope="col">Nama</th>
          <th scope="col">Gapok</th>
          <th scope="col">Tunjangan Jabatan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($jabatan as $item)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$item->kode}}</td>
          <td>{{$item->nama}}</td>
          <td>{{$item->gapok}}</td>
          <td>{{$item->tunjangan_jabatan}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>