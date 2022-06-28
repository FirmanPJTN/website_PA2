<div class="modal fade" id="def<?= $ada->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL PENGADAAN ASET</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @if($ada->status == 'proses')
            <button class="btn form-control btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
            @endif
            @if($ada->status == 'proses-setuju')
            <button class="btn form-control btn-info" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses setuju</button>
            @endif
            @if($ada->status == 'tolak')
            <button class="btn form-control btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> Ditolak</button>
            @endif
            @if($ada->status == 'setuju')
            <button class="btn form-control btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Disetujui</button>
            @endif

            <div class="form-group ml-2 mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Kode Pengadaan</label>
                    <input type="text" name="kodePengadaan" class="form-control mx-4" value="{{$ada->kodePengadaan}}" disabled autofocus autocomplete="off">
                </div>
            </div>

            <div class="form-group ml-2 mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Pengada</label>
                    <input type="text" name="pengada" class="form-control mx-4" value="{{$ada->user->nama}}" autofocus autocomplete="off" disabled>
                </div>
            </div>

            <div class="form-group ml-2 mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Unit</label>
                    <input type="text" name="unit" class="form-control mx-4" value="{{$ada->unit->unit}}" autofocus autocomplete="off" disabled>
                </div>
            </div>


            <?php $pembelian = DB::table('pembelian')->where('pengadaan_id', '=', $ada->id)->get() ?>

            @foreach($pembelian as $beli)
            <div class="modal-body row">
                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 ">Daftar Permintaan Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ $beli -> jenisBarang1 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ $beli -> tipeBarang1 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ $beli -> jumlahBarang1 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>

                @if (!empty($beli -> jenisBarang2))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $beli -> jenisBarang2 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $beli -> tipeBarang2 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $beli -> jumlahBarang2 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>

                @if (!empty($beli -> jenisBarang3))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $beli -> jenisBarang3 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $beli -> tipeBarang3 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $beli -> jumlahBarang3 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>


                @if (!empty($beli -> jenisBarang4))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $beli -> jenisBarang4 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $beli -> tipeBarang4 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $beli -> jumlahBarang4 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>

                @if (!empty($beli -> jenisBarang5))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $beli -> jenisBarang5 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $beli -> tipeBarang5 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $beli -> jumlahBarang5 }}" autofocus autocomplete="off" disabled size="5">

                    </div>
                </div>

                @endif

                @endif

                @endif

                @endif


                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Dokumen Product Request</label>
                        <a href="./../dokumen/PR/{{$beli->dokumenPR}}" class="btn btn-info form-control mx-4" target="_blank">Download Dokumen</a>
                    </div>
                </div>

                @if($beli->dokumenPO != NULL)
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Dokumen Product Order</label>
                        <a href="./../dokumen/PO/{{$beli->dokumenPO}}" class="btn btn-secondary form-control mx-4" target="_blank">Download Dokumen</a>
                    </div>
                </div>
                @endif


                @if($beli -> deskripsi != NULL && $beli->deskripsi2 == NULL)
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Catatan Tambahan PR</label>
                        <textarea name="deskripsi" class="form-control mx-4" cols="30" rows="10" value="{{ $beli-> deskripsi }}" autofocus autocomplete="off" disabled>{{ $beli -> deskripsi }}</textarea>
                    </div>
                </div>
                @endif

                @if($beli -> deskripsi == NULL && $beli->deskripsi2 != NULL)
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Catatan Tambahan PO</label>
                        <textarea name="deskripsi2" class="form-control mx-4" cols="30" rows="10" value="{{ $beli-> deskripsi2 }}" autofocus autocomplete="off" disabled>{{ $beli -> deskripsi2 }}</textarea>
                    </div>
                </div>
                @endif

                @if($beli -> deskripsi != NULL && $beli->deskripsi2 != NULL)
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Catatan Tambahan PR</label>
                        <textarea name="deskripsi" class="form-control mx-4" cols="30" rows="10" value="{{ $beli-> deskripsi }}" autofocus autocomplete="off" disabled>{{ $beli -> deskripsi }}</textarea>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Catatan Tambahan PO</label>
                        <textarea name="deskripsi2" class="form-control mx-4" cols="30" rows="10" value="{{ $beli-> deskripsi2 }}" autofocus autocomplete="off" disabled>{{ $beli -> deskripsi2 }}</textarea>
                    </div>
                </div>
                @endif


                @if($beli->alasan != NULL && $beli->status == 'tolak')
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Alasan Penolakan</label>
                        <textarea name="alasan" class="form-control mx-4" cols="30" rows="10" value="{{ $ada-> alasan }}" autofocus autocomplete="off" disabled>{{ $beli -> alasan }}</textarea>
                    </div>
                </div>
                @endif

                @if($beli->gambar != NULL)
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Faktur Pembelian</label>
                        <img src="../../foto/pembelian-aset/{{$beli->gambar}}" alt="" width="700">
                        <img src="../../foto/pembelian-aset/{{$beli->gambar}}" alt="" width="80" style="visibility: hidden">
                    </div>
                </div>
                @endif

                @endforeach

            </div>
            <div class="modal-footer">
                <button style="width: 100%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("tglAda<?= $ada->id ?>").disabled = true;
</script>