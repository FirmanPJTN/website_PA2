<!-- Sidebar  -->
<nav id="sidebar">
    <div id="dismiss">
        <span class="iconify" data-icon="bx:arrow-to-left" data-height=25></span>
    </div>

    <div class="sidebar-header">
        <img src="../../../image/logov2.png" alt="" width="180px">
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="#"><span class="iconify" data-icon="ant-design:home-filled" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="iconify" data-icon="healthicons:i-documents-accepted" data-height="30"></span>&nbsp;&nbsp;&nbsp;&nbsp;Persetujuan</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Pengadaan Eksternal</a>
                </li>
                <li>
                    <a href="{{route('pinjam-aset-approver')}}">Peminjaman Aset</a>
                </li>
                <li>
                    <a href="{{route('musnah-aset-approver')}}">Pemusnahan Aset</a>
                </li>
                <li>
                    <a href="{{route('musnah-berkas-approver')}}">Pemusnahan Berkas</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><span class="iconify" data-icon="bxs:report" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Laporan Berkala</a>
        </li>
    </ul>

</nav>