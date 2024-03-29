<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/png" href="../../background/title.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Bootstrap Table -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap');

        body {
            font-family: 'Quicksand', sans-serif;
            background: url("background/register.png") no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-between">

        <div class="mt-2 ml-5">
            <div class="row justify-content-center">
                <div class="col-md-12 ml-5">
                    <div class="card mt-2" style="width:850px; height:720px">

                        <div class="card-body">

                            <div class="titleCard fw-bold mb-3 text-center">
                                <h1>Senang melihat Anda di sini!</h1>
                                <h5 style="color: #757575">Mari siapkan akun Anda hanya dalam <br>beberapa langkah.</h5>
                            </div>


                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-1 mr-5">

                                    <div class="col-md-6">
                                        <label for="nama" class="col-md-4 col-form-label">Nama</label>
                                    </div>

                                    <div class="col-md-12">
                                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror ml-3" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                    </div>
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                                <div class="row mb-1 mr-5">

                                    <div class="col-md-6">

                                        <label for="unit" class="col-md-4 col-form-label">Unit</label>

                                    </div>

                                    <div class="col-md-12">

                                        <select class="form-control custom-select ml-3" name="unit_id" id="unit_id">
                                            <option value="">▼ pilih unit</option>
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    @error('unit_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="row mb-1 mr-5">

                                    <div class="col-md-6">

                                        <label for="email" class="col-md-4 col-form-label">Email</label>
                                    </div>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror ml-3" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    </div>


                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="row mb-1 mr-5">

                                    <div class="col-md-6">
                                        <label for="role" class="col-md-4 col-form-label">Role</label>
                                    </div>

                                    <div class="col-md-12">

                                        <select class="form-control custom-select @error('role') is-invalid @enderror ml-3" name="role" id="role" value="{{ old('role') }}">
                                            <option value="visitor" <?php if (old('role') == 'visitor') { ?>selected="selected" <?php } ?>>Visitor</option>
                                            <option value="approver" <?php if (old('role') == 'approver') { ?>selected="selected" <?php } ?>>Approver</option>
                                            <option value="transactor" <?php if (old('role') == 'transactor') { ?>selected="selected" <?php } ?>>Transactor</option>
                                        </select>
                                    </div>


                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="row mb-1 mr-5">

                                    <div class="col-md-6">
                                        <label for="password" class="col-md-4 col-form-label">Password</label>
                                    </div>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror ml-3" name="password" required autocomplete="new-password">
                                    </div>


                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="row mb-1 mr-5">

                                    <div class="col-md-6">
                                        <label for="password-confirm" class="col-md-8 col-form-label">Konfirmasi Password</label>
                                    </div>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control ml-3" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="mt-5">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mr-4">
                                            Daftar
                                        </button>

                                        <a href="{{ route('login') }}" class="btn btn-outline-secondary ml-4">
                                            Masuk
                                        </a>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ml-5">
            <img src="background/logoV2.png" class="mt-4" alt="" width="300" style="margin-left: 150px">
            <br>
            <img src="/background/registerImage.png" class=" mr-4" alt="" width="500" style="padding-top: 100px">
        </div>

    </div>



    <script>
        function showPassword() {
            event.preventDefault()
            var x = document.getElementById("password");
            //var icon = document.getElementById("iconPassword");
            if (x.type === "password") {
                //icon.data-icon = "ic:baseline-visibility-off";
                x.type = "text";
            } else {
                //icon.data-icon = "ic:round-visibility";
                x.type = "password";
            }
        }
    </script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


    <!-- Iconify  -->
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>