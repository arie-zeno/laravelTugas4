@extends("dashboard.layouts.main")
@section("container")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Struktur</h1>
</div>
<div class="col-sm-8 mb-5">
    <form action="/dashboard/strukturs/{{$struktur->id}}" method="POST" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error("nama")
              is-invalid
          @enderror " value="{{old("nama", $struktur->nama)}}" id="nama" name="nama">
          @error("nama")
              <div class="invalid-feedback">
                  {{$message}}
              </div>
          @enderror
        </div>
        
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control @error("jabatan")
                is-invalid
            @enderror " value="{{old("jabatan", $struktur->jabatan)}}" id="jabatan" name="jabatan">
            @error("jabatan")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" class="form-control @error("nip")
                is-invalid
            @enderror " value="{{old("nip", $struktur->nip)}}" id="nip" name="nip">
            @error("nip")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error("email")
                is-invalid
            @enderror " value="{{old("email", $struktur->email)}}" id="email" name="email">
            @error("email")
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ket" class="form-label">Pendidikan</label>
            <textarea class="form-control @error("ket")
            is-invalid
        @enderror " id="ket" name="ket" rows="3">{{old("ket", $struktur->ket)}}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="hidden" name="oldImage" value="{{$struktur->foto}}">
            @if ($struktur->foto)
                <img src="{{asset("storage/".$struktur->foto)}}" class="img-preview img-fluid col-sm-5 d-block"><br>
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
          


        <button type="submit" class="btn btn-primary">Update Struktur</button>
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