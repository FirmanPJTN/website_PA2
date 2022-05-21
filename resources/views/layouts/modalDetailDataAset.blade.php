<div class="modal fade" id="abc<?= $aset->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL DATA ASET</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
        
            <div class="form-group ">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Kode Aset</label>
                    <input type="text" name="kodeAset" class="form-control mx-4" value="{{$aset -> kodeAset}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Jenis Barang</label>
                    <input type="text" name="jenisBarang" class="form-control mx-4" value="{{$aset -> jenisBarang}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Tipe Barang</label>
                    <input type="text" name="tipeBarang" class="form-control mx-4" value="{{$aset -> tipeBarang}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Jumlah Barang</label>
                    <input type="number" name="jumlahBarang" class="form-control mx-4" value="{{$aset -> jumlahBarang}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                <label class="mx-4 w-25">Kategori</label>
                <input type="text" name="kategori" class="form-control mx-4" value="{{$aset -> kategori}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Kategori Pakai</label>
                    @if($aset->isInternal==0)
                    <input type="text" name="kategoriPakai" class="form-control mx-4" value="Barang Tidak Habis (Eksternal)" disabled>
                    @endif
                    @if($aset->isInternal==1)
                    <input type="text" name="kategoriPakai" class="form-control mx-4" value="Barang Habis (Internal)" disabled>
                    @endif
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25" >Tanggal Pembelian</label>
                    <input type="text" name="tglBeli" class="form-control mx-4" value="{{$aset -> tglBeli}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Penyimpanan</label>
                    <input type="text" name="penyimpanan" class="form-control mx-4" value="{{$aset -> penyimpanan}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Gedung</label>
                    <input type="text" name="gedung" class="form-control mx-4" value="{{$aset -> gedung}}" disabled>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Unit</label>
                    <input type="text" name="unit" class="form-control mx-4" value="{{$aset -> unit}}" disabled>
                </div>
            </div>


        </div>
        <div class="modal-footer">
        <button style="width: 100%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>
