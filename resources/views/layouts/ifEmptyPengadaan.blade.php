@if (!empty($pengadaan -> jenisBarang2)) 

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $pengadaan -> jenisBarang2 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $pengadaan -> tipeBarang2 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $pengadaan -> jumlahBarang2 }}" autofocus autocomplete="off" required size="5">
        </div>
    </div>

    @if (!empty($pengadaan -> jenisBarang3))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $pengadaan -> jenisBarang3 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $pengadaan -> tipeBarang3 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $pengadaan -> jumlahBarang3 }}" autofocus autocomplete="off" required size="5">
        </div>
    </div>


    @if (!empty($pengadaan -> jenisBarang4))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $pengadaan -> jenisBarang4 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $pengadaan -> tipeBarang4 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $pengadaan -> jumlahBarang4 }}" autofocus autocomplete="off" required size="5">
        </div>
    </div>

    @if (!empty($pengadaan -> jenisBarang5))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $pengadaan -> jenisBarang5 }}" autofocus autocomplete="off" required>

            <label >Tipe</label>
            <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $pengadaan -> tipeBarang5 }}" autofocus autocomplete="off" required>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $pengadaan -> jumlahBarang5 }}" autofocus autocomplete="off" required size="5">

        </div>
    </div>

@endif

@endif

@endif

@endif