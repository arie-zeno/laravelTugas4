@extends("dashboard.layouts.main")
@section("container")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Foto</h1>
</div>

<div class="col-sm-8 mb-5">
    <form action="/dashboard/fotos/{{$foto->id}}" method="POST" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="mb-3">
          <label for="caption" class="form-label">Caption</label>
          <input type="text" class="form-control @error("caption")
              is-invalid
          @enderror " value="{{old("caption", $foto->caption)}}" id="caption" name="caption">
          @error("caption")
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>


        <div class="mb-3">
            <label for="foto" class="form-label">Thumbnail</label>
            @if ($foto->foto)
                <img src="{{asset("storage/".$foto->foto)}}" class="img-preview img-fluid col-sm-5 d-block"><br>
            @else
            <img class="img-preview img-fluid col-sm-5"><br>
            @endif
            <input class="form-control @error("foto")
            is-invalid
        @enderror" type="file" id="foto" name="foto" onchange="previewImage()">
        @error("foto")
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>
          


        <button type="submit" class="btn btn-primary">Update Foto</button>
    </form>
    
</div>
<script>

    function previewImage(){
        const image = document.querySelector("#foto"),
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