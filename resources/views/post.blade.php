@extends("layouts.main")

@section("container")
<div class="container pb-5 bg-white my-3 overflow-hidden rounded">

    <h1>{{$post->title}}</h1>
    <p>by Admin | <a href="/categories/{{$post->category->slug}} ">{{$post->category->name}}</a> </p>
    <h4>{{$post->penulis}}</h4>
    @if ($post->image)
    <img class="shadow me-3 img-thumbnail float-start" src="{{asset("storage/".$post->image)}}" alt="" style="max-height:250px;">
    @else
    <img class="float-start me-3 mb-3 img-thumbnail"  src="https://source.unsplash.com/400x200?programming " alt="">
    @endif
    <p>{!!$post->body!!}</p>

    <a href="/berita" class="btn btn-sm btn-danger">< kembali</a>
</div>
@endsection