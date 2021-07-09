    <table class="table table-striped mt-3" border="1">
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
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>