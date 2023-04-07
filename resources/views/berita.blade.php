@extends("layouts.main")

@section("container")
<div class="container">

    <h2 class="text-center mt-3">Berita Terbaru</h2>
    <hr class=" border border-dark">
</div>



<div class="container py-5" style="min-height: 100vh">
    @if($posts->count())
    <div class="row">
        @foreach($posts as $post)
        <div class="col-sm-3 mt-4 ">

            <div class="card shadow">
                <div style="max-height:200px; overflow:hidden; ">

                    {{-- <img src="img/1.jpg" class="card-img-top" alt="..."> --}}
                    @if ($post->image)
                    <img class=" float-start" src="{{asset("storage/".$post->image)}}" alt="" style="width:100%;">
                    @else
                    <img class="float-start"  src="https://source.unsplash.com/1000x1000?programming" alt="">
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">{{$post->title}}</h4>
                    <p class="card-text text-center"><small class="text-muted">
                                <a href="/categories/{{$post->category->slug}}" class="text-decoration-none">{{$post->category->name}} </a> |  {{$post->created_at->diffForHumans()}}</small></p>
               
                    <p class="card-text text-muted">{!!$post->excerpt!!} <a href="/berita/{{$post->slug}}">Selengkapnya</a></p>
                </div>
            </div>
            </div>
            @endforeach
            @else
            <p class="text-center fs-4">Postingan Belum ada</p>
            @endif
        </div>
    </div>



@endsection