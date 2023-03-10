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
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{asset('/storage/images/bookicon.png')}}" alt="book" width="30px" height="30px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>
    </nav>    
    <div class="h-100 d-flex justify-content-center align-items-center my-5" style="min-height: 100vh">
        <div class="container-md   my-5 w-25 border p-5 shadow bg-light rounded" style="">
            <h1 class="text-center">LOGIN</h1>
                @if (session()->has('sukses'))
                    <div class="alert alert-success">
                        {{session()->get('sukses')}}
                    </div>
                @endif
                <form action="/login" method="post">
                @csrf
                    <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="username" class="form-control" id="username" name="username" placeholder="Enter Your Username" aria-describedby="emailHelp" value={{Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : "" }} >
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>   
        </div>
    </div>
    <footer class="footer">
      <div class="container-fluid bg-light fixed-bottom">
        <p style="margin: 0">Current and time : <span id="outDate"></span></p>
        <p class="text-center" >Copyright &#169 KAMPUS KONTOL{{date('Y')}}</p>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('/js/clock.js')}}"></script>
</body>
</html>