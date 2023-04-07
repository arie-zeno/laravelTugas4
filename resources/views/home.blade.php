@extends("layouts.main")


<div id="carouselExampleControls" class="carousel slide overflow-hidden" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="img/header2.JPG" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="img/header1.JPG" class="d-block w-100" alt="...">
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@section("container")

<div class="container rounded mt-5"><p class="bg-white p-2 rounded"><marquee>Selamat Datang Di Website HIMPIKOM</marquee></p></div>



<div class="container mt-5">
  <div class="bg-primary py-2 text-white text-center" style="width: 90px;">Berita</div>
  
  <div class="row justify-content-center border-top border-primary">
    @if($posts->count())
    <div class="col-sm-8">
      <div class="card my-3 ">
        @if ($posts[0]->image)
        <img class="shadow img-thumbnail" src="{{asset("storage/".$posts[0]->image)}}" alt="" style="max-heigt:100px;" >
        @else
        <img class="mb-3 img-thumbnail"  src="https://source.unsplash.com/600x200?programming" alt="">
        @endif
        {{-- <img src="https://source.unsplash.com/600x200/?school" class="card-img-top" alt="..."> --}}
          <div class="card-body">
            <h3 class="card-title">{{$posts[0]->title}}</h3>
            <p>
              <small class="text-muted">by Admin | <a href="/categories/{{$posts[0]->category->slug}}" class="text-decoration-none">{{$posts[0]->category->name}} </a>| {{$posts[0]->created_at->diffForHumans()}}
              </small>
            </p>
            <p class="card-text">{!!$posts[0]->excerpt!!} </p>
            <a href="/berita/{{$posts[0]->slug}}" class="btn btn-small btn-outline-primary text-decoration-none">Selengkapnya</a>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card text-bg-dark my-3 p-3 bg-white">
          <img src="https://source.unsplash.com/600x600?programming" class="card-img" alt="...">
          <div class="card-img-overlay p-0 d-flex align-items-end">
            
            <h4 class="card-title flex-fill text-center text-white py-2" style="background-color:rgba(0, 0, 0, 0.6) ;">Kegiatan HIMA<br><a href="/categories/kegiatan" class="text-decoration-none text-white btn btn-sm btn-outline-info">Klik Disini</a></h4>
          </div>
        </div>

        <div class="card text-bg-dark my-3 p-3 bg-white">
          <img src="https://source.unsplash.com/600x600?hacking" class="card-img" alt="...">
          <div class="card-img-overlay p-0 d-flex align-items-end">
            
            <h4 class="card-title flex-fill text-center text-white py-2" style="background-color:rgba(0, 0, 0, 0.6) ;">Berita HIMA Lainnya <br><a href="/berita" class="text-decoration-none text-white btn btn-sm btn-outline-info">Klik Disini</a></h4>
          </div>
        </div>

      
      </div>

    </div>

  </div>
  @else
  <p class="text-center fs-4 text-dark">Belum ada Postingan</p>
</div>
@endif

<div class="container mt-5 bg-white p-4">
  <div class="bg-primary py-2 text-white text-center " style="width: 90px;">Video</div>

  <div class="row justify-content-center border-top border-primary py-4">
    <div class="col-sm-7 mt-3">
      <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">

        <ul class="uk-slideshow-items">

            <li>
            <iframe src="https://www.youtube-nocookie.com/embed/e-G-WZe61LU?autoplay=1&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: false; autoplay:false"></iframe>
            </li>            
            <li>
            <iframe src="https://www.youtube-nocookie.com/embed/UYS0pdRMwrk?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: false; autoplay:false"></iframe>
            </li>
            <li>
            <iframe src="https://www.youtube-nocookie.com/embed/gT0027ncbzw?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: false; autoplay:false"></iframe>
            </li>  
            <li>
            <iframe src="https://www.youtube-nocookie.com/embed/LoXh4vk0X7Y?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: false; autoplay:false"></iframe>
            </li>                     
        </ul>

      <a class="uk-position-center-left uk-position-small " href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
      <a class="uk-position-center-right uk-position-small " href="#" uk-slidenav-next uk-slideshow-item="next"></a>
      
    </div>
    
  </div>
</div>
</div>

<div class="container mt-5">
  
  <div class="bg-primary py-2 text-white text-center" style="width: 90px;">Foto</div>
  <div class="row justify-content-center border-top border-primary">
    <div class="col-sm-9 mt-3 bg-white pt-3 rounded">
      @if($fotos->count())
    
    <div class="uk-position-relative uk-visible-toggle uk-dark pb-2" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 2000">

      <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
      @foreach ($fotos as $foto)        
      <li>
        <div class="uk-panel">
          <img src="{{asset("storage/".$foto->foto)}}" alt="" style="max-height:400px;">
        </div>
      </li>
      @endforeach

      </ul>

      <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
      <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

      <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
      </div>
    </div>
    <div class="text-center mt-4">
      <!-- <a href="/galeri" class=" btn btn-outline-primary text-decoration-none">Foto Lainnya</a> -->
      <div class="row justify-content-center">
        <div class="col-sm-4">
          <div class="card text-bg-dark my-3 p-3 bg-white shadow">
              <img src="/img/1.JPG" class="card-img" alt="...">
              <div class="card-img-overlay p-0 d-flex align-items-end">
                
                <h4 class="card-title flex-fill text-center text-white py-2" style="background-color:rgba(0, 0, 0, 0.6) ;">Foto Lainnya <br><a href="/galeri" class="text-decoration-none text-white btn btn-sm btn-outline-info">Klik Disini</a></h4>
              </div>
            </div>
  
        </div>

      </div>

    </div>
  </div>
  @else
  <h3 class="text-center">Foto belum ada</h3>
  @endif
</div>

<div class="container pb-5" id="komen">
  <div class="bg-primary py-2 text-white text-center" style="width: 90px;">Komentar</div>
  <div class="row justify-content-center border-top border-primary">
    <div class="col-sm-9 mt-5">
      @foreach ($komens as $komen)
        
      <article class="uk-comment">
        <header class="uk-comment-header">
            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                  <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#"><i class="bi bi-person-circle"></i> {{$komen->nama}} </a></h4>
                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                        <li><a href="#"><small> {{$komen->created_at->diffForHumans()}} </small></a></li>
                    </ul>
                  </div>
                </div>
              </header>
              <div class="uk-comment-body" style="margin-top: -20px">
                <small>
            <p style="white-space: pre-line">{{$komen->komen}}</p>
            <hr class="border-top border-danger">
          </small>
        </div>
      </article>
      @endforeach
    </div>

    <div id="modal-sections" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Tambahkan Komentar</h2>
            </div>
            <div class="uk-modal-body">
                <form action="/" method="post">
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" required placeholder="Nama" name="nama">
                    <label for="floatingInput">Nama</label>
                  </div>
                  

                  <div class="form-floating">
                    <textarea class="form-control" required placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="komen"></textarea>
                    <label for="floatingTextarea2">Komen</label>
                  </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit">Komentar</button>
              </form>

            </div>
        </div>
    </div>
    
  </div>
  <a class="btn btn-sm btn-danger text-decoration-none text-end " href="#modal-sections" uk-toggle>Tambahkan Komentar</a>
</div>

</div>
</div>

@endsection