@extends("layouts.main")

@section("container")
{{-- <div class="container">

    <h1>Post Category : {{$title}}</h1>
    @foreach($posts as $post)
    <a href="/{{$post->slug}}">
        <h1>{{$post->title}} </h1>
    </a>
    
    
    <small class="text-white">by Admin | <a href="/categories/{{$posts[0]->category->slug}}" class="text-decoration-none">{{$posts[0]->category->name}} </a>| {{$posts[0]->created_at->diffForHumans()}}
    </small>
    <p>{{$post->excerpt}} </p>
    @endforeach
</div> --}}

<div class="container py-5">
    
    <h1>Post Category : {{$title}}</h1>
    
    <div class="row">
        @foreach($posts as $post)
        <div class="col-sm-3 mt-4 ">

            <div class="card shadow">
                <div style="max-height:200px; overflow:hidden; ">

                    {{-- <img src="img/1.jpg" class="card-img-top" alt="..."> --}}
                    @if ($post->image)
                    <img class=" float-start" src="{{asset("storage/".$post->image)}}" alt="" style="height:100%;">
                    @else
                    <img class="float-start"  src="https://source.unsplash.com/1000x1000?programming" alt="">
                    @endif
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">{{$post->title}}</h4>
                    <p class="card-text text-center"><small class="text-muted">
                                By Admin | {{$post->created_at->diffForHumans()}}</small></p>
                    <p class="card-text fs-6 text-muted">{!!$post->excerpt!!} <a href="/berita/{{$post->slug}}">Selengkapnya</a></p>
                </div>
            </div>
            
        </div>
            @endforeach
    </div>
</div>

@endsection