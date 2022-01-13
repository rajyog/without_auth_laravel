<html>
    <body>
@foreach($view as $res)
<form action="{{route('view')}}">
    <center><image src="{{url('/public/storage/'.$res->path)}}" width="100"/></center><br/><br/>
@endforeach
</form>
    </body>
</html>