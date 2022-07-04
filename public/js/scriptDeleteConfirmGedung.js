
$('.deleteGedung').click(function() {
    var id = $(this).attr('data-id');

    swal({
        title: "Apakah Anda Yakin?",
        text: "Anda akan menghapus data tersebut dan tidak dapat dikembalikan",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal({
                title: "Gedung Berhasil Dihapus!",
                icon: "success",
                timer:3000
            });
            window.location = "/ManajemenAset/DataAset/Gedung/Hapus/"+id+"";
        } else {
            swal({
                title: "Gedung Gagal Dihapus!",
                icon: "error",
                timer:3000
            });
        }
    });
});