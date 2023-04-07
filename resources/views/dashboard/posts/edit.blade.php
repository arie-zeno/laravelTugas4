@extends("dashboard.layouts.main")
@section("container")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Berita</h1>
</div>

<div class="col-sm-8 mb-5">
    <form action="/dashboard/posts/{{$post->slug}}" method="POST" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error("title")
              is-invalid
          @enderror " id="title" name="title" value="{{$post->title}}">
          @error("title")
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}} </option>
                    
                @endforeach
              </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Thumbnail</label>
            @if ($post->image)
            <img src="{{asset("storage/".$post->image)}}" class="img-preview img-fluid col-sm-5 d-block"><br>
            @else
            <img class="img-preview img-fluid col-sm-5"><br>
            @endif
            <input class="form-control @error("image")
            is-invalid
        @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error("image")
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" value="{{old("body", $post->body)}}" name="body">
            <trix-editor input="body"></trix-editor>
            @error("body")
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
            
        </div>

        <button type="submit" class="btn btn-primary">Update Berita</button>
    </form>
    
</div>

<script>
    const title = document.querySelector("#title"),
        slug = document.querySelector("#slug")
        
    title.addEventListener("change", function(){
        fetch("/dashboard/posts/checkSlug?title=" + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener("trx-file-accept", function(e){
        e.preventDefault();
    });

    function previewImage(){
        const image = document.querySelector("#image"),
            imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
        
</script>

  @endsection