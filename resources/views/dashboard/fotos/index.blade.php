@extends("dashboard.layouts.main")
@section("container")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Galeri</h1>
</div>
@if(session()->has("success"))
<div class="alert alert-success col-sm-8" role="alert">
  {{session("success")}}
</div>
@endif
<a href="/dashboard/fotos/create" class="btn btn-sm btn-primary mb-3">Tambah Foto</a>
<div class="table-responsive col-sm-8">
    <table class="table table-striped table-sm ">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Foto</th>
          <th scope="col">Caption</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($fotos as $foto)
        <tr>
          <td>{{$loop->iteration}} </td>
          <td><img src="{{asset("storage/".$foto->foto)}}" alt="{{asset("storage/".$foto->foto)}}" width="100"></td>
          <td>{{$foto->caption}}</td>
          <td>
              <a href="/dashboard/fotos/{{$foto->id}}/edit" class="badge bg-success btn-sm"><span data-feather="edit"></span></a>
              <form action="/dashboard/fotos/{{$foto->id}}" method="post" class="d-inline">
                @method("delete")
                @csrf
                <button class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
              </form>
          </td>
        </tr>
            
        @endforeach
      </tbody>
    </table>
  </div>

@endsection