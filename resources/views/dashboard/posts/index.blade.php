@extends("dashboard.layouts.main")
@section("container")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Berita</h1>
</div>
@if(session()->has("success"))
<div class="alert alert-success col-sm-8" role="alert">
  {{session("success")}}
</div>
@endif
<a href="/dashboard/posts/create" class="btn btn-sm btn-primary mb-3">Tambah Berita</a>
<div class="table-responsive col-sm-8">
    <table class="table table-striped table-sm ">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{$loop->iteration}} </td>
          <td>{{$post->title}}</td>
          <td>{{$post->category->name}}</td>
          <td>
              <a href="/dashboard/posts/{{$post->slug}}" class="badge bg-info btn-sm"><span data-feather="eye"></span></a>
              <a href="/dashboard/posts/{{$post->slug}}/edit" class="badge bg-success btn-sm"><span data-feather="edit"></span></a>
              <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
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