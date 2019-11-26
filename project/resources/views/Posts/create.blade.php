<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
        @include('header')
    @if(Auth::Check())
    <div class="container py-3"style="border:solid 1px #1fa67a; border-radius:5px">
        <div class="row">
            <div class="col-12 col-md-8">
                <form action="/posts" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter desciption" name="description">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Content</label>
                        <br>
                        <textarea name="content" id="" cols="90" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Category: </label>
                        <select name="category_id" id="cat">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            <option value="{{ $category->id+1 }}">Other Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                            <a onclick="show()"><b>Other Category</b></a>
                            {{-- <div id="inputOtherCategory" style="display: none">
                                <input type="text" name="otherCategory" id="inputOtherCategory" style="display: none">
                            </div> --}}
                            <input type="text" name="otherCategory" id="inputOtherCategory" style="display: none">
                    </div>
                    <button type="submit" class="otherButton">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @else 
        <div>
            <h6>Vui lòng đăng nhập</h6>
        </div>
    @endif

    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    <script>
        function show(){
            document.getElementById('inputOtherCategory').style.display="flex";
        }
        // function click1(){
        //     var a=document.getElementById('cat').value;
        //     if(a==0){
        //         document.getElementById('inputOtherCategory').style.display="flex";
        //     }
            
        // }
        </script>
</body>

</html>