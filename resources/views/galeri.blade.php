@extends("layouts.main")
<style>
    .item-light{
    height: 100px;
    width: 150px;
    overflow: hidden;
    border: 1px solid;
}
.item-light .foto{
    height: 100%;
    background-color: #eaeaea;
    background-size: cover;
    background-position: center;
    transform: scale(1.2);
    transition: 0.4s;
}
.item-light:hover .foto{
    transform: scale(0.9);
}
</style>
@section("container")

<div class="container pb-5" style="min-height:100vh">
    @if($fotos->count())

    <h1 class="text-center my-5 text-dark">Galeri</h1>
    {{-- <div class="d-flex flex-wrap col-sm-9 mx-auto justify-content-around " uk-lightbox="animation: slide"> --}}
        <div style="display: flex;justify-content:space-evenly;flex-wrap:wrap;align-content:space-around" uk-lightbox>
        @foreach ($fotos as $foto)
        {{-- <div> --}}
            {{-- <a class="uk-inline border border-primary mt-1" href="{{asset("storage/".$foto->foto)}}" data-caption="{{$foto->caption}}" style="width:250px;height:200px; overflow:hidden">
                <img src="{{asset("storage/".$foto->foto)}}" alt="">
            </a> --}}
            <a class="item-light mb-3" href="{{asset("storage/".$foto->foto)}}" data-caption="{{$foto->caption}}">
                <div class="foto" style="background-image: url('{{asset("storage/".$foto->foto)}}');"></div></a>
        {{-- </div> --}}
        @endforeach
    </div>
</div>
  

@else
<h1 class="text-center">Foto Belum ada</h1>
@endif
@endsection