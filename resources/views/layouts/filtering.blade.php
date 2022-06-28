<div class="d-flex justify-content-start mb-4 pt-2 bg-dark rounded">
    <p class="ml-5 mt-1 bg-light fw-bold pl-2 rounded-start" style="color:black">SELEKSI&nbsp;</p>
    <p class="mt-1 mr-3 bg-light fw-bold pr-2 mr-5 rounded-end" style="color:black">DATA</p>

    <form class="form-inline" method="get">
        <div class="d-flex ">

            <p class="mt-1 ml-5 mr-3" style="color:white">Unit</p>
            <select class="form-control filter mr-3" name="filterUnit" id="filterUnit"  value="{{ old('filterUnit') }}">
                <option value="">▼ Pilih Unit</option>
                @foreach($units as $unit)
                <option value="{{$unit->id}}">{{$unit->unit}}</option>
                @endforeach
            </select>

            <p class="ml-5 mt-1 mr-3" style="color:white">Kategori</p>
            <select class="form-control filter ml-2 mr-5" name="filterKategori" value="{{Request::get('filterKategori')}}"  >
                <option value="">▼ Pilih kategori</option>
                {{$data2 = DB::table('data_asets')->select('id')->take(1)->get();}}
                @foreach ($data2 as $aset)
                    <option value="Mebeler" <?php if (old(Request::get('filterKategori')) == 'Mebeler') {?>selected<?php } ?>>Mebeler</option>
                    <option value="Alat Tulis / PC / Notebook" <?php if (old(Request::get('filterKategori')) == 'Alat Tulis / PC / Notebook') {?>selected<?php } ?>> Alat Tulis / PC / Notebook</option>
                    <option value="Audio Visual" <?php if (old(Request::get('filterKategori')) == 'Audio Visual') {?>selected<?php } ?>>Audio Visual</option>
                    <option value="Peralatan Rumah Tangga, Wisma dan Asrama" <?php if (old(Request::get('filterKategori')) == 'Peralatan Rumah Tangga, Wisma dan Asrama') {?>selected<?php } ?>>Peralatan Rumah Tangga, Wisma, dan Asrama</option>
                    <option value="Barang Persediaan Kampus" <?php if (old(Request::get('filterKategori')) == 'Barang Persediaan Kampus') {?>selected<?php } ?>>Barang Persediaan Kampus</option>
                    <option value="Alat - Alat Lab, Peraga, Kesenian, Kesehatan dll" <?php if (old(Request::get('filterKategori')) == 'Alat - Alat Lab, Peraga, Kesenian, Kesehatan dll') {?>selected<?php } ?>> Alat - Alat Lab, Peraga, Kesenian, Kesehatan dll</option>
                @endforeach
            </select>

            
            <button class="btn btn-outline-light mb-2" type="submit">Cari</button>
        </div>
    </form>

</div>