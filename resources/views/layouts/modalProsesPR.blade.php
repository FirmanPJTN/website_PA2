<div class="modal fade" id="lmn<?= $ada->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <form enctype="multipart/form-data" action="/MonitoringAset/PengadaanAset/ProsesPR/Simpan/{{$ada->id}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">

                    <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">PROSES PERSETUJUAN PRODUCT REQUEST</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <input type="hidden" name="statusProsesPR" value="proses-PR" style="visibility: hidden">


                <div class="modal-body row">
                    <div class="form-group ml-2 mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Kode Pengadaan</label>
                            <input type="text" name="kodePengadaan" class="form-control mx-4" value="{{$ada->kodePengadaan}}" autofocus autocomplete="off" disabled>
                        </div>
                    </div>


                    <div class="form-group input_fields_wrap2 mt-3">
                        <div class="d-flex justify-content-start">
                            <label class="mx-4 w-100 ">Daftar Permintaan Barang</label>

                            <label class="ml-5 pl-2">Jenis</label>
                            <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ old('jenisBarang1') }}" autofocus autocomplete="off" required>

                            <label>Tipe</label>
                            <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ old('tipeBarang1') }}" autofocus autocomplete="off" required>

                            <label class="form-label" visibilit>Jumlah</label>
                            <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ old('jumlahBarang1') }}" autofocus autocomplete="off" required size="5">

                            <a class="add_field_button2"><span class="iconify" data-icon="carbon:add-alt" style="color: #0fa958;" data-height="25"></span></a>
                        </div>

                    </div>

                   

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Dokumen PR</label>
                            <input type="file" name="dokumenPR" class="form-control mx-4" value="{{old('dokumenPR')}}">
                        </div>


                        @error('dokumenPR')
                        <div class="alert-danger mt-2 mr-2">{{$message}}</div>
                        @enderror
                    </div>



                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Catatan Tambahan</label>
                            <textarea name="deskripsi" placeholder="bersifat optional ..." class="form-control mx-4" cols="30" rows="10" autofocus autocomplete="off"></textarea>
                        </div>

                    </div>
                </div>



                <input type="hidden" name="deskripsiProsesPR" value="kode pengadaan {{$ada->kodePengadaan}} meminta persetujuan PR" style="visibility: hidden">

                <input type="hidden" name="pengadaan_id" value="{{$ada->id}}" style="visibility: hidden">


                <?php $approvers =  DB::table('users')->where('role', '=', 'approver')->get() ?>
                @foreach($approvers as $approver)
                <input type="hidden" name="role" value="{{$approver->role}}" style="visibility: hidden">
                @endforeach



                <div class="modal-footer d-flex">
                    <button style="width: 40%" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>

                    <button style="width: 40%" type="submit" class="btn btn-success">Kirim</button>
                </div>

            </form>
        </div>
    </div>