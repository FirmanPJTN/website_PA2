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
            <a href="{{route('dashboard')}}"><span class="iconify" data-icon="ant-design:home-filled" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Beranda</a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="iconify" data-icon="eos-icons:cluster-management" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Manajemen</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/ManajemenAset/DataAset">Data Aset</a>
                </li>
                <li>
                    <a href="/ManajemenAset/PengadaanAset">Pengadaan Aset</a>
                </li>
                <li>
                    <a href="/ManajemenAset/PeminjamanAset">Peminjaman Aset</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="iconify" data-icon="bi:eye-fill" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Monitoring</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="/MonitoringAset/PerencanaanMonitoring">Perencanaan Monitoring</a>
                </li>
                <li>
                    <a href="{{route('musnah-aset')}}">Pemusnahan Aset</a>
                </li>
                <li>
                    <a href="{{route('musnah-berkas')}}">Pemusnahan Berkas</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/LaporanBerkala"><span class="iconify" data-icon="bxs:report" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Laporan Berkala</a>
        </li>
        <li>
            <a href="/KelolaPengguna"><span class="iconify" data-icon="bxs:user-rectangle" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Kelola Pengguna</a>
        </li>
    </ul>

    <!-- <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
    </ul> -->
</nav>