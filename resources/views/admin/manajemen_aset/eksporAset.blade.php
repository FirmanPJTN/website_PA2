<table class="table table-striped table-bordered mb-5">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Kode Barang</th>
            <th scope="col" class="text-center">Nama Barang</th>
            <th scope="col" class="text-center">Tipe Barang</th>
            <th scope="col" class="text-center">Jumlah Barang</th>
            <th scope="col" class="text-center">Kategori</th>
            <th scope="col" class="text-center">Kategori Pakai</th>
            <th scope="col" class="text-center">Tanggal Pembelian</th>
            <th scope="col" class="text-center">Penyimpanan</th>
            <th scope="col" class="text-center">Gedung</th>
            <th scope="col" class="text-center">Unit</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1 ?>
            @foreach ($asets as $aset)
        <tr>
            <td>{{$i}}</td>
            <td>{{$aset->kodeAset}}</td>
            <td>{{$aset -> jenisBarang}}</td>
            <td>{{$aset -> tipeBarang}}</td>
            <td>{{$aset -> jumlahBarang}}</td>
            <td>{{$aset -> kategori}}</td>
            @if($aset->IsInternal == 0)
            <td>Barang Tidak Habis (Eksternal)</td>
            @endif
            @if($aset->IsInternal == 1)
            <td>Barang Habis (Internal)</td>
            @endif
            <td>{{$aset -> tglBeli}}</td>
            <td>{{$aset -> penyimpanan}}</td>
            <td>{{$aset -> gedung}}</td>
            <td>{{$aset -> unit}}</td>
        </tr>
        <?php $i++;?>
        @endforeach
        
    </tbody>
</table>