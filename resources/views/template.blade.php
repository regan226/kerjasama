<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/background.css')}}">
    <title>Kerjasama</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/home')}}">
            <img src="{{asset('/storage/images/bookicon.png')}}" alt="book" width="30px" height="30px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              @if (Auth::check())
              @php
              $id = Auth::user()->id;
              @endphp
                @if(Auth::user()->role == 1)

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/inputMenu')}}">Input</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/pengajuanAcc')}}">Pengajuan</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Database
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($jurusan as $j)
                    <a class="dropdown-item" href='/viewDB/{{$j->id}}'>{{$j->jurusan}}</a>
                  @endforeach
                </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hello, {{Auth::user()->full_Name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <hr/>
                        <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                    </div>
                  </li>


                @elseif (Auth::user()->role == 2)
                @php
                $id = Auth::user()->id;    
                @endphp
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/pengajuanInput')}}">Pengajuan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Database
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($jurusan as $j)
                    <a class="dropdown-item" href='/viewDB/{{$j->id}}'>{{$j->jurusan}}</a>
                  @endforeach
                </li>
                </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hello, {{Auth::user()->full_Name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <hr/>
                        <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                    </div>
                  </li>
                @endif
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/login')}}">Login</a>
                  </li>
              @endif
            </ul>
          </div>
        </div>
    </nav>
    </nav>    
    <div class="h-100 d-flex justify-content-center align-items-center my-5" style="min-height: 100vh">
        @yield('content')
    </div>
    <footer class="footer">
      <div class="container-fluid bg-light fixed-bottom">
        <p class="text-center" >Copyright &#169 Universitas Universal {{date('Y')}}</p>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('/js/clock.js')}}"></script>
</body>
</html>