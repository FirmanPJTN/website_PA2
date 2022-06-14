<div class="modal fade" id="def<?= $beli->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

    <form enctype="multipart/form-data" action="/transactor/PembelianAset/Internal/Proses/Simpan/{{$beli->id}}" method="post">
        {{ csrf_field() }}

        <div class="modal-header">
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL PEMBELIAN ASET</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body row">

        <input type="hidden" name="statusSetuju" value="setuju" style="visibility: hidden">

            <div class="form-group input_fields_wrap">
                <div class="d-flex justify-content-start mt-4 ">
                    <label class="mx-4 w-100 ">Daftar Pemesanan Barang</label>
                    
                    <label class="ml-5 pl-2">Jenis</label>
                    <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ $beli -> jenisBarang1 }}" autofocus autocomplete="off" disabled>

                    <label >Tipe</label>
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

            <label >Tipe</label>
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

            <label >Tipe</label>
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

            <label >Tipe</label>
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

            <label >Tipe</label>
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
                    <label class="mx-4 w-25" >Tanggal Pengajuan</label>
                    <input type="text" class="form-control mx-4" id="tglPinjam<?= $beli->id ?>" value="{{$beli -> created_at -> format('Y-m-d')}}" autofocus autocomplete="off" disabled>
                </div>
            </div>


            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Faktur Pembelian</label>
                    <input type="file" name="gambar" class="form-control mx-4" value="{{old('gambar')}}">
                </div>
                

                @error('gambar')
                    <div class="alert-danger mt-2 mr-2">{{$message}}</div>
                @enderror
            </div>


        </div>

        <input type="hidden" name="deskripsiSetuju" value="PR kode pengadaan {{$ada->kodePengadaan}} disetujui dan menunggu proses pembayaran" style="visibility: hidden">

        <input type="hidden" name="idPengadaan" value="{{$ada->id}}" style="visibility: hidden">


        <?php $approvers =  DB::table('users')->where('role','=','approver')->get() ?>
        @foreach($approvers as $approver)
        <input type="hidden" name="roleApprover" value="{{$approver->role}}" style="visibility: hidden">
        @endforeach

        <?php $admins =  DB::table('users')->where('role','=','administrator')->get() ?>
        @foreach($admins as $admin)
        <input type="hidden" name="roleAdmin" value="{{$admin->role}}" style="visibility: hidden">
        @endforeach

        <?php $users =  DB::table('users')->where('id','=',$ada->user_id)->get() ?>
        @foreach($users as $user)
        <input type="hidden" name="idUser" value="{{$user->id}}" style="visibility: hidden">
        @endforeach

        <div class="modal-footer d-flex">
            <button style="width: 40%" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>

            <button style="width: 40%" type="submit" class="btn btn-success">Kirim</button>
        </div>

        </form>
        
    </div>
    </div>
</div>
