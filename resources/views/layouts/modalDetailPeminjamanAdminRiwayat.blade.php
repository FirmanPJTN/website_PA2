<div class="modal fade" id="abcr<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL PEMINJAMAN ASET</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="form-group mt-3 mx-4">
                @if($pinjam->status == 'proses')
                <button class="btn form-control btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
                @endif

                @if($pinjam->status == 'setuju')
                <button class="btn form-control btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Disetujui</button>
                @endif

                @if($pinjam->status == 'tolak')
                <button class="btn form-control btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> Ditolak</button>
                @endif

                
                @if($pinjam->status == 'kembali')
                <button class="btn form-control btn-secondary" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Dikembalikan</button>
                @endif
                
            </div>

            <div class="form-group ml-2 mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Peminjam</label>
                    <input type="text" name="peminjam" class="form-control mx-4" value="{{$pinjam->user->nama}}" autofocus autocomplete="off" disabled>
                </div>
            </div>

            <div class="form-group ml-2 mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Unit</label>
                    <input type="text" name="unit" class="form-control mx-4" value="{{$pinjam->unit->nama}}" autofocus autocomplete="off" disabled>
                </div>
            </div>

            <div class="modal-body row">
                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4">
                        <label class="ml-4 w-25">Daftar Barang</label>
                        <label style="margin-left: 130px">Nama</label>
                        <input type="text" value="{{$pinjam->aset->tipeBarang}}" class="form-control mx-5" disabled>

                        <label class="ml-2">Jumlah</label>
                        <input type="number" name="jumlah" class="mx-4" value="{{$pinjam->jumlahPinjam}}" style="margin-top: 2px; margin-bottom:2px" min="1" max="10" disabled>
                    </div>
                </div>



                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Tanggal Peminjaman</label>
                        <input type="text" name="tglPinjam" class="form-control mx-4" id="tglPinjam<?= $pinjam->id ?>" value="{{$pinjam -> created_at -> format('Y-m-d')}}" autofocus autocomplete="off" disabled>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Tanggal Pengembalian</label>
                        <input type="text" name="tglKembali" class="form-control mx-4" id="tglKembali<?= $pinjam->id ?>" value="{{ $pinjam -> tglKembali }}" autofocus autocomplete="off" disabled>
                    </div>
                </div>


                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Tujuan Peminjaman</label>
                        <textarea name="tujuan" class="form-control mx-4" cols="30" rows="10" value="{{ $pinjam-> tujuan }}" autofocus autocomplete="off" disabled>{{ $pinjam -> tujuan }}</textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer text-center">
                <button style="width: 100%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
