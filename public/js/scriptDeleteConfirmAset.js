
$('.delete').click(function() {
    var id = $(this).attr('data-id');
    var kodeAset = $(this).attr('data-kode');

    swal({
        title: "Apakah Anda Yakin?",
        text: "Anda menghapus data dengan kode Aset "+ kodeAset,
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/ManajemenAset/DataAset/Hapus/"+id+"";
            swal({
                title: "Data Berhasil Dihapus!",
                icon: "success",
                timer:3000,
            });
        } else {
            swal({
                title: "Data Gagal Dihapus!",
                icon: "error",
                timer:3000
            });
        }
    });
});