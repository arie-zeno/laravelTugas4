@extends("dashboard.layouts.main")
@section("container")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Struktur</h1>
</div>
@if(session()->has("success"))
<div class="alert alert-success col-sm-8" role="alert">
  {{session("success")}}
</div>
@endif
<a href="/dashboard/strukturs/create" class="btn btn-sm btn-primary mb-3">Tambah Struktur</a>
<div class="table-responsive col-sm-8">
    <table class="table table-striped table-sm ">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Foto</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($strukturs as $post)
        <tr>
          <td>{{$loop->iteration}} </td>
          <td><img src="{{asset("storage/".$post->foto)}}" alt="{{asset("storage/".$post->foto)}}" width="100"></td>
          <td>{{$post->jabatan}}</td>
          <td>
              <a href="/dashboard/strukturs/{{$post->id}}/edit" class="badge bg-success btn-sm"><span data-feather="edit"></span></a>
              <form action="/dashboard/strukturs/{{$post->id}}" method="post" class="d-inline">
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