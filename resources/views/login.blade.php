<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       
        <title>Web Page</title>

    </head>
    <body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark full-width" >
    <a class="navbar-brand" href="{{url('/register')}}">Student Registration Form</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/register')}}">Registration <span class="sr-only">(current)</span></a>
            </li>

            <?php
            if (session()->has('user')) {
                ?>                    
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/view')}}">Viewdata</a>
                </li>
<!--                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Google profile</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                </li>

                <?php
                } 
                else 
                {
                ?>
                 <li class="nav-item"> 
                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                </li>

                <?php
            }
            ?>

        </ul>

    </div>
</nav>        <form method="post" name="login" action="{{url('/login')}}" enctype="multipart/form-data" style="width: 600px;margin: auto;padding: 50px">
           @if(Session::has('success'))
             <div class="alert alert-success">{{Session::get('success')}}</div>
             @endif
              @if(Session::has('fail'))
             <div class="alert alert-danger">{{Session::get('fail')}}</div>
             @endif
             @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
            @csrf
           <div class="form-group row">
                <div class="col-md-6 offset-md-3 ">
                    <a href="{{route('login.google')}}" class="btn btn-danger btn-block bi bi-google">  Login With Google</a>
                    {{--  <a href="{{route('login.facebook')}}" class="btn btn-primary btn-block bi bi-facebook">  Login With Facebook</a>
                    <a href="{{route('login.github')}}" class="btn btn-dark btn-block bi bi-github">  Login With Github</a> --}}
            </div>
            </div>
            <p class="font-weight-bold" style="text-align: center;">OR</p>
            <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control"/>
                        <div class="text-danger font-weight-bold"><small>@error('email'){{$message}} @enderror</small></div>
                    </div>
           
          <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control"  />
                        <div class="text-danger font-weight-bold"><small>@error('password'){{$message}} @enderror</small></div>
                        <a class=" bold" href="{{route('register')}}">Click Here To Registration</a>           
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="offset-md-4 bold" href="{{ route('forget.password.get') }}">Forget Password?</a>
          </div>
            <div class="col-md-6 offset-md-3">
            <button type="submit" name="submit" class="bi bi-login btn-secondary form-control">Login</button>
            </div>
        </form>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="../prog/jquery.min.js" type="text/javascript"></script>
         <script src="set.js" type="text/javascript"></script>

    </body>
</html>
