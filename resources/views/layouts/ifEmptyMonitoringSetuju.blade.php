@if (!empty($monitor -> jenisBarang2)) 

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $monitor -> jenisBarang2 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $monitor -> tipeBarang2 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $monitor -> jumlahBarang2 }}" autofocus autocomplete="off" required disabled size="5">
        </div>
    </div>

    @if (!empty($monitor -> jenisBarang3))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $monitor -> jenisBarang3 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $monitor -> tipeBarang3 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $monitor -> jumlahBarang3 }}" autofocus autocomplete="off" required disabled size="5">
        </div>
    </div>


    @if (!empty($monitor -> jenisBarang4))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $monitor -> jenisBarang4 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $monitor -> tipeBarang4 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $monitor -> jumlahBarang4 }}" autofocus autocomplete="off" required disabled size="5">
        </div>
    </div>

    @if (!empty($monitor -> jenisBarang5))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $monitor -> jenisBarang5 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $monitor -> tipeBarang5 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $monitor -> jumlahBarang5 }}" autofocus autocomplete="off" required disabled size="5">

        </div>
    </div>

@endif

@endif

@endif

@endif