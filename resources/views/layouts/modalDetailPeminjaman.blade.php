<div class="modal fade" id="abc<?= $pinjam->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL PEMINJAMAN ASET</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body row">

                @if($pinjam->status == 'proses')
                <button class="btn form-control btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
                @endif
                @if($pinjam->status == 'tolak')
                <button class="btn form-control btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> Ditolak</button>
                @endif
                @if($pinjam->status == 'setuju')
                <button class="btn form-control btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Disetujui</button>
                @endif
                @if($pinjam->status == 'kembali')
                <button class="btn form-control btn-secondary" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Dikembalikan</button>
                @endif

                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Kode Peminjaman</label>
                        <input type="text" name="kodePeminjaman" class="form-control mx-4" value="{{ $pinjam -> kodePeminjaman }}" autofocus autocomplete="off" disabled>
                    </div>
                </div>

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 ">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ $pinjam -> jenisBarang1 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ $pinjam -> tipeBarang1 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang1 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>

                @if (!empty($pinjam -> jenisBarang2))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $pinjam -> jenisBarang2 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $pinjam -> tipeBarang2 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang2 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>

                @if (!empty($pinjam -> jenisBarang3))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $pinjam -> jenisBarang3 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $pinjam -> tipeBarang3 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang3 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>


                @if (!empty($pinjam -> jenisBarang4))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $pinjam -> jenisBarang4 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $pinjam -> tipeBarang4 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang4 }}" autofocus autocomplete="off" disabled size="5">
                    </div>
                </div>

                @if (!empty($pinjam -> jenisBarang5))

                <div class="form-group input_fields_wrap">
                    <div class="d-flex justify-content-start mt-4 ">
                        <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>

                        <label class="ml-5 pl-2">Jenis</label>
                        <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $pinjam -> jenisBarang5 }}" autofocus autocomplete="off" disabled>

                        <label>Tipe</label>
                        <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $pinjam -> tipeBarang5 }}" autofocus autocomplete="off" disabled>

                        <label class="form-label" visibilit>Jumlah</label>
                        <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang5 }}" autofocus autocomplete="off" disabled size="5">

                    </div>
                </div>

                @endif

                @endif

                @endif

                @endif

                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Tanggal Peminjaman</label>
                        <input type="date" name="tglPinjam" class="form-control mx-4" id="tglPinjam<?= $pinjam->id ?>" value="{{$pinjam -> created_at -> format('Y-m-d')}}" autofocus autocomplete="off">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Tanggal Pengembalian</label>
                        <input type="date" name="tglKembali" class="form-control mx-4" id="tglKembali<?= $pinjam->id ?>" value="{{ $pinjam -> tglKembali }}" autofocus autocomplete="off">
                    </div>
                </div>


                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Tujuan Peminjaman</label>
                        <textarea name="tujuan" class="form-control mx-4" cols="30" rows="10" value="{{ $pinjam-> tujuan }}" autofocus autocomplete="off" disabled>{{ $pinjam -> tujuan }}</textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button style="width: 100%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("tglKembali<?= $pinjam->id ?>").disabled = true;
    document.getElementById("tglPinjam<?= $pinjam->id ?>").disabled = true;
</script>