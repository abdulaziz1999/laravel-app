
    <table border="1">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">NIK</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Golongan</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Tgl Lahir</th>
          <th scope="col">Tempat Lahir</th>
          <th scope="col">Agama</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pegawai as $item)
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$item->nama}}</td>
          <td>{{$item->nik}}</td>
          <td>{{$item->jabatan}}</td>
          <td>{{$item->golongan}}</td>
          <td>{{$item->jk}}</td>
          <td>{{$item->tgl_lahir}}</td>
          <td>{{$item->tmp_lahir}}</td>
          <td>{{$item->agama}}</td>
          <td>{{$item->status}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>