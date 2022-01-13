<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       
        <title>Web Page</title>
       
    </head>
    
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" href="{{url('/register')}}">Student Registration Form</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/register')}}">Registration<span class="sr-only">(current)</span></a>
            </li>
            <?php
//            echo "<pre>";
//            print_r(session()->has('user'));
//            echo "</pre>";
//            die();
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
</nav> <br/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<!--        <form action="view" >
            <div class="row m-2">
                <div class="form-group col">
                    <input type="search" name="search" class="form-control" placeholder="Search"/>
                </div>
                <div class="col form-group">
                    <button class="btn-primary m-1">Search</button>
                </div>
            </div>
        </form>-->
        <table  class="table table-bordered" id="mytable" style="width: 50%;margin: auto;" border= "1px">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Date_of_birth</th>
                    <th>Photo</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody class="row-position">
            <tr>
                <?php
                $i = 0;
                ?>
                @foreach($registration as $res)
                <?php
                $i++;
                ?>
                <td>{{$i}}</td>
                <td>{{$res->First_Name}}</td>
                <td>{{$res->Last_Name}}</td>
                <td>{{$res->email}}</td>
                <td>{{$res->mobile}}</td>
                <td><?php echo base64_decode($res->password); ?></td>
                <td>{{$res->gender}}</td>
                <td>{{date('d-m-Y', strtotime($res->date_of_birth))}}</td>
                <td><image src="{{url('/storage/images/'.$res->photo)}}" width="100" /></td>
                <td><a onclick="return confirm('Are You Sure Want To Delete ?');" href="{{route('register.delete',['id'=>$res->id])}}"><button class="btn-lg bi bi-trash  btn btn-danger"></button></a></td>
                <td><a href="{{route('register.edit',['id'=>$res->id])}}"><button class="btn-lg bi bi-pencil-square btn btn-primary"></button></a></td>
                
            </tr>
            @endforeach
            </tbody>
        </table>
{{--<div class="row m-2">
            {{$registration->links()}}
        </div--}}
             <script type="text/javascript">
                     $(document).ready(function () {
                    $('#mytable').DataTable({
                        searching: true,
                        ordering: true,
                        paging: true
                    });
               
                $('.row_position').sortable({
                    delay: 150,
                    stop: function () {
                        var selectedData = new Array();
                        $('.row_position > tr').each(function () {
                            selectedData.push($(this).attr('id'));
                        });
                        updateOrder(selectedData);
                        {{--<a href="../../../pagning.php/ajaxPro.php"></a>--}}s
                    }
                });
                function updateOrder(data) {
                    $.ajax({
                        url: "ajaxPro.php",
                        type: 'post',
                        data: {position: data},
{{--               success: function () {
                          alert('your change successfully saved');
                        }--}}
                    })
                }
 });
                         </script>
    </body>
</html>
