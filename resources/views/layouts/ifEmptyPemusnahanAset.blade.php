@if (!empty($musnah -> jenisBarang2)) 

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $musnah -> jenisBarang2 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $musnah -> tipeBarang2 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $musnah -> jumlahBarang2 }}" autofocus autocomplete="off" required disabled size="5">
        </div>
    </div>

    @if (!empty($musnah -> jenisBarang3))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $musnah -> jenisBarang3 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $musnah -> tipeBarang3 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $musnah -> jumlahBarang3 }}" autofocus autocomplete="off" required disabled size="5">
        </div>
    </div>


    @if (!empty($musnah -> jenisBarang4))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $musnah -> jenisBarang4 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $musnah -> tipeBarang4 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $musnah -> jumlahBarang4 }}" autofocus autocomplete="off" required disabled size="5">
        </div>
    </div>

    @if (!empty($musnah -> jenisBarang5))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $musnah -> jenisBarang5 }}" autofocus autocomplete="off" required disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $musnah -> tipeBarang5 }}" autofocus autocomplete="off" required disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $musnah -> jumlahBarang5 }}" autofocus autocomplete="off" required disabled size="5">

        </div>
    </div>

@endif

@endif

@endif

@endif