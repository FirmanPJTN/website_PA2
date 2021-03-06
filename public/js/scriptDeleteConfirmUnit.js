
$('.deleteUnit').click(function() {
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
                title: "Unit Berhasil Dihapus!",
                icon: "success",
                timer:3000
            });
            window.location = "/KelolaPengguna/KelolaUnit/Hapus/"+id+"";
        } else {
            swal({
                title: "Unit Gagal Dihapus!",
                icon: "error",
                timer:3000
            });
        }
    });
});