
$('.deleteAda').click(function() {
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
                title: "Data Berhasil Dihapus!",
                icon: "success",
                timer:3000
            });
            window.location = "/ManajemenAset/PengadaanAset/Hapus/"+id+"";
        } else {
            swal({
                title: "Data Gagal Dihapus!",
                icon: "error",
                timer:3000
            });
        }
    });
});