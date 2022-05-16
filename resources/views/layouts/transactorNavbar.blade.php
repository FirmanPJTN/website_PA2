<!-- Sidebar  -->
<nav id="sidebar">
    <div id="dismiss">
        <span class="iconify" data-icon="bx:arrow-to-left" data-height=25></span>
    </div>

    <div class="sidebar-header">
        <img src="../../../../image/logov2.png" alt="" width="180px">
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="{{route('index-transactor')}}"><span class="iconify" data-icon="ant-design:home-filled" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="iconify" data-icon="bi:credit-card-fill" data-height="25"></span>&nbsp;&nbsp;&nbsp;&nbsp;Pembelian Aset</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('index-internal')}}">Internal (Barng Habis)</a>
                </li>
                <li>
                    <a href="{{route('index-eksternal')}}">Eksternal (Barang Tidak Habis)</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>