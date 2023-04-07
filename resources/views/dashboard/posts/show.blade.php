@extends("dashboard.layouts.main")

@section("container")
<div class="col-sm overflow-hidden">

  <h1>{{$post->title}}</h1>
  <a href="/dashboard/posts" class="btn btn-sm btn-warning"><span data-feather="arrow-left"></span> Kembali</a>
  <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-sm btn-success"><span data-feather="edit"></span> Edit</a>
  <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
    @method("delete")
    @csrf
        <button class="btn btn-sm btn-danger"><span data-feather="x-circle"></span> Hapus</button>
      </form>
<div class="mt-5 col-sm-8">
@if ($post->image)
<img class="shadow me-3 img-thumbnail float-start" src="{{asset("storage/".$post->image)}}" alt="" style="max-height:250px;">
@else
<img class="float-start me-3 mb-3 img-thumbnail"  src="https://source.unsplash.com/400x200?programming " alt="">
@endif
  <p class=" float-start">{!!$post->body!!}</p>
</div>
</div>
      
@endsection