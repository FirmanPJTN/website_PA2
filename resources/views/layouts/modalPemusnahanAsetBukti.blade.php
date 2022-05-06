<div class="modal fade" id="jkl<?= $musnah->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

    <form enctype="multipart/form-data" action="/MonitoringAset/PemusnahanAset/Bukti/{{$musnah->id}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
        <h2 class="modal-title fw-bold" id="exampleModalLabel">TAMBAH BUKTI OTENTIK</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <div class="modal-body row">
        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Kode Pemusnahan</label>
                <input type="text" name="kodePemusnahan" class="form-control mx-4" value="{{$musnah->kodePemusnahan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>


        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Waktu Pemusnahan</label>
                <input type="text" name="waktuPemusnahan" class="form-control mx-4" value="{{$musnah->waktuPemusnahan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>


        <div class="form-group mt-3 ml-2 input_fields_wrap">
            <a class="add_field_button float-right mr-2"><span class="iconify" data-icon="carbon:add-alt" style="color: #0fa958;" data-height="25"></span></a>

            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25">Gambar</label>
                <input type="file" name="gambarBarang1" class="form-control mx-4">
            </div>
            

            @error('gambar')
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


<script>
        $(document).ready(function() {
            var max_fields      = 5; //maximum input boxes allowed
            var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 2; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
                if(x <= max_fields){ //max input box allowed
                    $(wrapper).append('<div class="form-group mt-3 ml-2 input_fields_wrap"><a class=" remove_field float-right mr-2"><span class="iconify" data-icon="ant-design:minus-circle-outlined" style="color: #ff1e1e;" data-height="25"></span></a><div class="d-flex justify-content-center"><label class="mx-3 w-25" style="visibility: hidden">Gambar</label><input type="file" name="gambarBarang'+x+'" class="form-control mx-4 ml-1"></div></div>'); //add input box
                    x++; //text box increment
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); 
                $(this).parent('div').remove(); 
                x--;
                })
            });
    </script>

<script>
    document.getElementById("tglmusnah<?= $musnah->id ?>").disabled = true;
</script>

