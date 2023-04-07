@extends("layouts.main")

@section("container")
<div class="container" style="min-height: 100vh;">
    <main class="form-signin w-100 m-auto mt-5 border bg-white rounded">
        <form action="/register" method="POST" class="text-center">

            @csrf
            <img src="/img/profile.svg" alt="" width="72" height="57">
            <h1 class="h3 text-center mb-3 fw-normal">Daftar</h1>

            <div class="form-floating">
            <input type="text" class="form-control @error('user') is-invalid @enderror" id="floatingInput" autocomplete="off" required placeholder="Username" name="user" value="{{old('user') }}">
            <label for="floatingInput">Username</label>
            @error('user')
                <div class="invalid-feedback text-start">{{$message}}</div>
            @enderror
            </div>
            <div class="form-floating">
            <input type="password" required class="form-control rounded-top  @error('pass') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" value="{{old('password') }}">
            <label for="floatingPassword">Password</label>
            @error('pass')
                <div class="invalid-feedback text-start">{{$message}}</div>
            @enderror
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit" name="daftar">Daftar</button>
        </form>
    </main>
</div>
@endsection