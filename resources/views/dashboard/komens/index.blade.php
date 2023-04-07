@extends("dashboard.layouts.main")
@section("container")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Komen</h1>
</div>
@if(session()->has("success"))
<div class="alert alert-success col-sm-8" role="alert">
  {{session("success")}}
</div>
@endif
<div class="table-responsive col-sm-8">
    <table class="table table-striped table-sm ">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Komen</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($komens as $komen)
        <tr>
          <td>{{$loop->iteration}} </td>
          <td>{{$komen->komen}}</td>
          <td>
              <form action="/dashboard/komens/{{$komen->id}}" method="post" class="d-inline">
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