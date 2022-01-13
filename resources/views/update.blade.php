<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       
        <title>Web Page</title>

    </head>
    <body>
       <div>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/view')}}">Viewdata</a>
                </li>            <?php
            if (isset($_SESSION['user']) or isset($_SESSION['user_email_address'])) {
                ?>                    
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/view')}}">Viewdata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Google profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

                <?php
                } 
                else 
                {
                ?>
                 <li class="nav-item"> 
                    <a class="nav-link" href="login.php">Login</a>
                </li>

                <?php
            }
            ?>

        
        </ul>

    </div>
</nav>

        <form method="post" name="registration" action="update"  style="width: 600px;margin: auto;padding: 50px">
           @csrf
           <input type="hidden" name="id" value="{{$edit->id}}"/>
            <div class="row">
                <div class="col">
                     <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" class="form-control" value="{{$edit->First_Name}}"/>
                        <div class="text-danger font-weight-bold"><small>@error('fname'){{$message}} @enderror</small></div>
                    </div>

                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" class="form-control" value="{{$edit->Last_Name}}" />
                        <div class="text-danger font-weight-bold"><small>@error('lname'){{$message}} @enderror</small></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" value="{{$edit->email}}" />
                        <div class="text-danger font-weight-bold"><small>@error('email'){{$message}} @enderror</small></div>
                    </div>
           <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        <input type="text" name="mobile" class="form-control" value="{{$edit->mobile}}" />
                        <div class="text-danger font-weight-bold"><small>@error('mobile'){{$message}} @enderror</small></div>
                    </div>
           
          <div class="form-group">
                        <label for="ps">password:</label>
                        <input type="password" name="ps" class="form-control" value="<?php echo base64_decode($edit->password);?>"/>
                        <div class="text-danger font-weight-bold"><small>@error('ps'){{$message}} @enderror</small></div>
                    </div>

            <div class="form-group">
                        <label for="cps">Confirm Password:</label>
                        <input type="password" name="cps" class="form-control"  />
                        <div class="text-danger font-weight-bold"><small>@error('cps'){{$message}} @enderror</small></div>
                    </div>
                <div class="form-group">
                <label>Gender:<br/>
                    <input type="radio" name="gender" class="mx-2" value="Male" @if($edit->gender == 'Male') checked @endif />Male
                </label>
                <label>
                    <input type="radio" name="gender" class="mx-2" value="Female" @if($edit->gender == 'Female') checked @endif />Female
                </label>
                <label>
                    <input type="radio" name="gender" class="mx-2"  value="Other" @if($edit->gender == 'Other') checked @endif />Other
                </label>
                <div class="text-danger font-weight-bold"><small>@error('gender'){{$message}} @enderror</small></div>
            </div>
                  <div class="form-group">
                        <label for="dob">Date of birth:</label>
                        <input type="date" name="dob" class="form-control" value="{{$edit->date_of_birth}}" />
                        <div class="text-danger font-weight-bold"><small>@error('dob'){{$message}} @enderror</small></div>
                    </div>     
           <div class="form-group">
                        <label for="image">Select Photo:</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}" />
                        <div class="text-danger font-weight-bold"><small>@error('image'){{$message}} @enderror</small></div>
                    </div>
           <div class="form-check">
                <input type="checkbox" id="Term-condition" name="tc" class="form-check-input" value="tc"  checked />
                <label for="Term-condition" class="form-check-label">Accept Tearm & Condition</label>
                <div class="text-danger font-weight-bold"><small>@error('tc'){{$message}} @enderror</small></div>
            </div>
            <button type="submit" name="submit" class="mt-2 mx-2" >Save Change</button>
            <!--<button type="reset" class="mt-2 mx-2" >Reset</button>-->
            <div class="text-success">
                                    
            </div>
        </form>
       
       

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <!--<script src="../prog/jquery.min.js" type="text/javascript"></script>-->
         <!--<script src="set.js" type="text/javascript"></script>-->

    </body>
</html>
