<div class="modal fade" id="jkl<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <form enctype="multipart/form-data" action="/MonitoringAset/PemusnahanAset/Bukti/{{$musnah->kodePemusnahan}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h2 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH BUKTI OTENTIK</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row">
                    <div class="form-group ml-2 mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Kode Pemusnahan</label>
                            <input type="text" name="kodePemusnahan" class="form-control mx-4" value="{{$musnah->kodePemusnahan}}" autofocus autocomplete="off" disabled>
                        </div>
                    </div>


                    <div class="form-group ml-2 mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Waktu Pemusnahan</label>
                            <input type="text" name="waktuPemusnahan" class="form-control mx-4" value="{{$musnah->waktuPemusnahan}}" autofocus autocomplete="off" disabled>
                        </div>
                    </div>


                    <div class="form-group mt-3 ml-2 input_fields_wrap_gambar">

                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Bukti Otentik</label>
                            <input type="file" name="bukti" class="form-control mx-4">
                        </div>


                        @error('bukti')
                        <div class="alert-danger mt-2 mr-2">{{$message}}</div>
                        @enderror



                    </div>

                </div>


                <div class="modal-footer d-flex">
                    <button style="width: 40%" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                    <button style="width: 40%" type="submit" class="btn btn-info">Kirim</button>
                </div>

            </form>
        </div>
    </div>
</div>
