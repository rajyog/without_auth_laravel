<!--<div>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" href="{{url('/register')}}">Student Registration Form</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/register')}}">Home <span class="sr-only">(current)</span></a>
            </li>
<!--            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>-->
            <?php
            if (session()->has('user')) {
                ?>                    
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/view')}}">Viewdata</a>
                </li>
               
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
</nav>
@yield('content')
