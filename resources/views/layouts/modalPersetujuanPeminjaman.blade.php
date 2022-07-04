<div class="modal fade" id="jkl{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <form enctype="multipart/form-data" action="/approver/Persetujuan/PeminjamanAset/Simpan/{{$pinjam->kodePeminjaman}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">

                    <input type="hidden" name="statusSetuju" value="setuju" style="visibility: hidden">
                    <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">PERSETUJUAN PEMINJAMAN ASET</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <input type="hidden" name="statusTolak" value="tolak" style="visibility: hidden">


                <div class="modal-body row">
                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Kode Peminjaman</label>
                            <input type="text" name="kodePeminjaman" class="form-control mx-4" value="{{$pinjam->kodePeminjaman}}" autofocus autocomplete="off" disabled>
                        </div>
                    </div>

                    <div class="form-group input_fields_wrap">
                        <div class="d-flex justify-content-start mt-4">
                            <label class="ml-4 w-25">Daftar Barang</label>
                            <label style="margin-left: 130px">Nama</label>
                            <input type="text" value="{{$pinjam->aset->tipeBarang}}" class="form-control mx-5" name="nama" disabled>

                            <input type="hidden" name="kodeAset" value="{{$pinjam->aset->kodeAset}}">

                            <label class="ml-2">Jumlah</label>
                            <input type="number" name="jumlah" class="mx-4" value="{{$pinjam->jumlahPinjam}}" style="margin-top: 2px; margin-bottom:2px" min="1" max="10" disabled>
                        </div>
                    </div>

                    <input type="hidden" name="deskripsiNotifTolak" value="kode peminjaman {{$pinjam->kodePeminjaman}} ditolak" style="visibility: hidden">


                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Tanggal Pengembalian</label>
                            <input type="text" name="tglKembali" class="form-control mx-4" value="{{ $pinjam -> tglKembali }}" autofocus autocomplete="off" disabled>
                        </div>
                    </div>

                    <input type="hidden" name="statusNotifTolak" value="tolak" style="visibility: hidden">


                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Alasan Disetujui / Ditolak</label>
                            <textarea name="alasan" placeholder="bersifat optional ..." class="form-control mx-4" cols="30" rows="10" autofocus autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>

                <?php $admins =  DB::table('users')->where('role', '=', 'administrator')->get() ?>
                @foreach($admins as $admin)
                <input type="hidden" name="role" value="{{$admin->role}}" style="visibility: hidden">
                @endforeach

                <?php $visitors =  DB::table('users')->where('id', '=', $pinjam->user_id)->get() ?>
                @foreach($visitors as $visitor)
                <input type="hidden" name="idVisitor" value="{{$visitor->id}}" style="visibility: hidden">
                @endforeach


                <input type="hidden" name="deskripsiNotifSetuju" value="kode peminjaman {{$pinjam->kodePeminjaman}} disetujui" style="visibility: hidden">

                <input type="hidden" name="unit_id" value="{{$pinjam->unit->id}}" style="visibility: hidden">

                <input type="hidden" name="statusNotifSetuju" value="setuju" style="visibility: hidden">

                <div class="modal-footer d-flex">
                    <button style="width: 40%" type="submit" class="btn btn-danger" name="btnSubmit" value="tolak">Tolak</button>

                    <button style="width: 40%" type="submit" class="btn btn-success" name="btnSubmit" value="setuju">Setujui</button>
                </div>

            </form>
        </div>
    </div>