<div class="modal fade" id="ubah-pengadaan<?=$ada->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <form enctype="multipart/form-data" action="/visitor/PermohonanAset/PengadaanAset/Kirim/{{$ada->id}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">UBAH PENGADAAN</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group input_fields_wrap">
                        <div class="d-flex justify-content-start mt-4 ">
                            <label class="mx-4 w-100 ">Daftar Barang</label>

                            <label class="ml-5 pl-2">Jenis</label>
                            <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ $ada -> jenisBarang1 }}" autofocus autocomplete="off" required>

                            <label>Tipe</label>
                            <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ $ada -> tipeBarang1 }}" autofocus autocomplete="off" required>

                            <label class="form-label" visibilit>Jumlah</label>
                            <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ $ada -> jumlahBarang1 }}" autofocus autocomplete="off" required size="5">
                        </div>
                    </div>

                    @include('layouts.ifEmptyPengadaanVisitor')


                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Kategori Pengadaan</label>
                            <select class="form-control custom-select mx-4" name="kategori" id="kategori">
                                @if($ada -> kategori == 'eksternal' )
                                <option value="eksternal" <?php if (old('kategori') == 'eksternal') { ?>selected="selected" <?php } ?>>Eksternal (Barang Tidak Habis)</option>
                                <option value="internal" <?php if (old('kategori') == 'internal') { ?>selected="selected" <?php } ?>>Internal (Barang Habis)</option>
                                @else
                                <option value="internal" <?php if (old('kategori') == 'internal') { ?>selected="selected" <?php } ?>>Internal (Barang Habis)</option>
                                <option value="eksternal" <?php if (old('kategori') == 'eksternal') { ?>selected="selected" <?php } ?>>Eksternal (Barang Tidak Habis)</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Alasan Pengadaan</label>
                            <textarea name="alasan" class="form-control mx-4" cols="30" rows="10" value="{{ $ada -> alasan }}" autofocus autocomplete="off">{{ $ada -> alasan }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex">
                    <button style="width: 40%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button style="width: 40%" type="submit" class="btn btn-info mx-1">Kirim</button>
                </div>
            </form>

        </div>
    </div>
</div>