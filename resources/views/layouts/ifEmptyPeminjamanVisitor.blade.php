@if (!empty($pinjam -> jenisBarang2)) 

    <div class="form-group input_fields_wrap mr-4">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $pinjam -> jenisBarang2 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $pinjam -> tipeBarang2 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang2 }}" autofocus autocomplete="off" required size="5">
        </div>
    </div>

    @if (!empty($pinjam -> jenisBarang3))

    <div class="form-group input_fields_wrap mr-4">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $pinjam -> jenisBarang3 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $pinjam -> tipeBarang3 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang3 }}" autofocus autocomplete="off" required size="5">
        </div>
    </div>


    @if (!empty($pinjam -> jenisBarang4))

    <div class="form-group input_fields_wrap mr-4">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $pinjam -> jenisBarang4 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $pinjam -> tipeBarang4 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang4 }}" autofocus autocomplete="off" required size="5">
        </div>
    </div>

    @if (!empty($pinjam -> jenisBarang5))

    <div class="form-group input_fields_wrap mr-4">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $pinjam -> jenisBarang5 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $pinjam -> tipeBarang5 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $pinjam -> jumlahBarang5 }}" autofocus autocomplete="off" required size="5">

        </div>
    </div>

@endif

@endif

@endif

@endif