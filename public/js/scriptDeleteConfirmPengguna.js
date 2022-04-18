
$('.delete').click(function() {
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
            window.location = "/KelolaPengguna/Hapus/"+id+"";
            swal({
                title: "Data Pengguna Berhasil Dihapus!",
                icon: "success",
                timer:3000,
            });
        } else {
            swal({
                title: "Data Pengguna Gagal Dihapus!",
                icon: "error",
                timer:3000
            });
        }
    });
});