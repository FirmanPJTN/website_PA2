<nav class="navbar navbar-light rounded-pill" style="background-color: #135589;">
    <div class="d-flex justify-content-between">
            <button type="button" id="sidebarCollapse" class="btn mx-4" style="background-color: #2A93D5;">
            <i class="fas fa-align-left"></i></button>

            <form class="form-inline" method="get">
                <div class="d-flex">
                    <input class="form-control" type="search" name="cari" value="{{Request::get('cari')}}"  placeholder="Cari di sini..." aria-label="Search" size = 50  > &nbsp; 
                    <button class="btn btn-outline-light ml-3" type="submit">Cari</button>
                </div>
            </form>
    </div>
    

    <div class="d-flex justify-content-end mr-3">
                
        <a href="" class="mx-4"><span class="iconify" data-icon="akar-icons:bell" data-height="25" style="color: #fff"></span><span class="badge" style="color: white; background-color:red; border-radius: 100%;">2</span></a>


        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="iconify" data-icon="bxs:user"></span> {{ Auth::user()->nama }} &nbsp;&nbsp;&nbsp;&nbsp;</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Keluar</a></li>
            </form>
            </ul>
        </div>


    </div>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</nav>