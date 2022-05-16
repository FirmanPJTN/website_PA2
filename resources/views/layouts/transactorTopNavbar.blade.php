<nav class="navbar navbar-light rounded-pill" style="background-color: #135589;">
    <div class="d-flex justify-content-between">
            <button type="button" id="sidebarCollapse" class="btn mx-4" style="background-color: #2A93D5;">
            <span class="iconify" data-icon="gg:menu" data-height=20></span></button>

            <form class="form-inline" method="get">
                <div class="d-flex">
                    <input class="form-control" type="search" name="cari" value="{{Request::get('cari')}}"  placeholder="Cari di sini..." aria-label="Search" size = 50  > &nbsp; 
                    <button class="btn btn-outline-light ml-3" type="submit">Cari</button>
                </div>
            </form>
    </div>
    

    <div class="d-flex justify-content-end mr-3">
                
       

        <div class="dropdown mr-2">
            <a href="#" class="mx-4 dropdown-toggle my-dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="iconify" data-icon="akar-icons:bell" data-height="25" style="color: #fff"></span>

                <?php $numNotifUser = DB::table('notifikasi')->where('role',Auth::user()->role)->count(); ?>



                @if($numNotifUser!=0)
                <span class="badge" style="color: white; background-color:red;  height: 18px;width: 18px;border-radius: 50%;display: inline-block; ">{{ $numNotifUser }}</span>
                @endif
            </a>
            
            
            <?php 
            $data = DB::table('notifikasi')->where('role',Auth::user()->role)->get(); ?>

            <?php
            function secondsToTime($inputSeconds) {
                $secondsInAMinute = 60;
                $secondsInAnHour = 60 * $secondsInAMinute;
                $secondsInADay = 24 * $secondsInAnHour;
            
                // Extract days
                $days = floor($inputSeconds / $secondsInADay);
            
                // Extract hours
                $hourSeconds = $inputSeconds % $secondsInADay;
                $hours = floor($hourSeconds / $secondsInAnHour);
            
                // Extract minutes
                $minuteSeconds = $hourSeconds % $secondsInAnHour;
                $minutes = floor($minuteSeconds / $secondsInAMinute);
            
                // Extract the remaining seconds
                $remainingSeconds = $minuteSeconds % $secondsInAMinute;
                $seconds = ceil($remainingSeconds);
            
                // Format and return
                $timeParts = [];
                $sections = [
                    'hari' => (int)$days,
                    'jam' => (int)$hours,
                    'menit' => (int)$minutes,
                    'detik' => (int)$seconds,
                ];
            
                foreach ($sections as $name => $value){
                    if ($value > 0){
                        $timeParts[] = $value. ' '.$name.($value == 1 ? '' : '');
                    }
                }
            
                return implode(', ', $timeParts);
            }
            ?>
        


            <ul class="dropdown-menu dropdown-menu-right notify-menu mt-2" aria-labelledby="dropdownMenuLink">
                <li class="dropdown-header text-center fw-bold">PEMBERITAHUAN</li>
                <hr color="black">  
                @foreach($data as $ntf)
                    <li class="mt-3">
                        <?php 
                            $now = Carbon::now();
                            $created_at = Carbon::parse($ntf->created_at);
                            $diffMinutes = $created_at->diffInMinutes($now);
                            $second = $diffMinutes*60;
                        ?>
                        <h6 class="text-right mr-3" style="color: #888; font-size: 14px"><span class="iconify" data-icon="ant-design:field-time-outlined"></span>{{secondsToTime($second)}}</h6>
                        <div class="d-flex">
                            <a class="dropdown-item" id="notifyDesc" href="#"><span class="iconify" data-icon="carbon:view-filled" data-height=25></span> {{$ntf->deskripsi}}</a>
                            <a href="/notifikasi/{{$ntf->id}}"  class="delete-notifikasi" title="Telah dibaca"><span class="iconify sudahBaca" data-icon="emojione-v1:cross-mark" style="color: #f24e1e; margin-right: 10px; font-size: 14px"></span></a>
                            <!-- <button class="btn btn-danger btn-delete" style="font-size: 0.8em;" id="deleteNotify" data-id="{{ $ntf->id }}" >
                            Delete
                            </button> -->
                        </div>    
                    </li>
                @endforeach

                <li class="text-center mt-2">
                    <a href="/notifikasiUnit/{{Auth::user()->unit}}" style="color:#2a93d5;  text-decoration: underline;">tandai semua telah dibaca</a>
                </li>
            </ul>
        </div>


        <div class="dropdown mr-5">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="iconify" data-icon="bxs:user"></span> {{ Auth::user()->nama }} &nbsp;&nbsp;&nbsp;&nbsp;</span>
            </button>
            <ul class="dropdown-menu  mt-2" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/transactor/profil">Profil</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Keluar</a></li>
            </form>
            </ul>
        </div>


    </div>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</nav>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(".btn-delete").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
    
        $.ajax(
        {
            url: "notifikasi/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (){
                console.log("it Works");
            }
        });
    
    });
</script>