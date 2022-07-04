<div class="d-flex justify-content-start mb-4 pt-2 bg-dark rounded">
    <p class="ml-5 mt-1 bg-light fw-bold pl-2 rounded-start" style="color:black">SELEKSI&nbsp;</p>
    <p class="mt-1 mr-3 bg-light fw-bold pr-2 mr-5 rounded-end" style="color:black">DATA</p>

    <form class="form-inline" method="get">
        <div class="d-flex ">

            <p class="mt-1 ml-5 mr-3" style="color:white">Unit</p>
            <select class="form-control filter mr-3" name="filterUnit" id="filterUnit"  value="{{ old('filterUnit') }}">
                <option value="">▼ Pilih Unit</option>
                @foreach($units as $unit)
                <option value="{{$unit->id}}">{{$unit->nama}}</option>
                @endforeach
            </select>

            <p class="ml-5 mt-1 mr-3" style="color:white">Kategori</p>
            <select class="form-control filter ml-2 mr-5" name="filterKategori" value="{{Request::get('filterKategori')}}"  >
            <option value="">▼ Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                @endforeach
            </select>

            
            <button class="btn btn-outline-light mb-2" type="submit">Cari</button>
        </div>
    </form>

</div>