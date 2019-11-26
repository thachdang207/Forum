@include('header')
<!--Phong-->
<div class="container container-content">
    <div class="row post-row">
        <div class="col-2 d-flex align-items-center">
            <div class="avatar"></div>
        </div>
        <div class="col-2 d-flex ">
            <h5>{{ $reportsOfPost[0]->name }}</h5>
        </div>
        <div class="col-3 offset-5 d-flex  flex-column align-items-end justify-content-between ">
            <form action="{{ route('posts.destroy',$reportsOfPost[0]->id) }}" method="POST" class="mt-2">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <p>Post at: {{ $reportsOfPost[0]->created_at }}</p>
        </div>
    </div>
    <div class="row post-title">
        <div class="col-12 d-flex align-items-center">
            <h4 class="title">{{ $reportsOfPost[0]->title }}</h4>
        </div>
    </div>
    <div class="row post-content">
        <div class="mx-3">{{ $reportsOfPost[0]->content }}</div>
    </div>
</div>
<div class="container container-comment mt-5">
    <div class="row">
        <div class="col-12">
            <h5 class="text-danger">Reports:</h5>
        </div>
    </div>
    @foreach($reportsOfPost as $reportOfPost)
    <div class="row row-list-comment my-2">
        <div class="col-8">
            <p><i class="fas fa-user mr-2"></i>{{ $reportOfPost->user_id->name }}</p>
            <div class="content">{{ $reportOfPost->content }}</div>
            {{--  <div class="items d-flex align-items-center mb-1">
                    <a href="#" class="mr-3"><i class="far fa-thumbs-up"></i>Like</a>
                    <a href="#" class="mr-3 comment"><i class="far fa-comment comment"></i> Comment</a>
                    <a href="#"><i class="fas fa-exclamation"></i> Report</a>
                </div>  --}}
        </div>
    </div>
    @endforeach
</div>
<!--end-->

<script>
    var i = 0;
    $(document).ready(function () {
        $(".comment").click(function () {
            if (i == 0) {
                $(".textComment").css("display", "flex");
                i = 1;
            } else {
                $(".textComment").css("display", "none");
                i = 0;
            }
        });
    });
</script>

</body>

</html>