<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <h4 class="text-uppercase">Create page</h4>
    <form method="post" action="{{route('users.store')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="">NAME</label>
            <input type="text" class="form-control" placeholder="name" name="name">
        </div>
        <div class="form-group">
            <label for="">EMAIL</label>
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
            <label for="">PASSWORD</label>
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
            <select class="form-control" name="role_id">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-danger">CONFIRM</button>
    </form>
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