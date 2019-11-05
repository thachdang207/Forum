<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Users</title>

</head>
<body>
<div class="container" style="margin-top: 30px">
    <div style="display: flex">
        <form action="{{route('users.index')}}">
            <button type="submit" class="btn btn-success">Home</button>
        </form>
        <div class="col-lg-10">
            <h1 class="text-center text-uppercase">aptech php laravel crud users</h1>
        </div>
    </div>
</div>
<hr>
<div class="container" style="margin-top: 30px">
    <h4 class="text-uppercase">index page</h4>
    <table class="table table-bordered">
        <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role_id</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="text-center">
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role_id}}</td>
                <td style="display: flex; justify-content: center">
                    <div style="margin-right: 10px">
                        <form action="{{route('users.show',$user->id)}}" method="get">
                            <button type="submit" class="btn btn-primary">Show</button>
                        </form>
                    </div>
                    <div style="margin-right: 10px">
                        <form action="{{route('users.edit',$user->id)}}" method="get">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </div>
                    <div style="margin-right: 10px">
                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<hr>
<div class="container-fluid" style="margin-top: 30px">
    <div style="display: flex" class="row">
        <div class="col-4 offset-2">
            <span class="text-muted text-uppercase">aptech php laravel crud users</span>
        </div>
        <div class="col-3 offset-3">
            <form action="{{route('users.create')}}" method="get">
                <button type="submit" class="btn btn-warning">CREATE AN USER</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>