@extends("layouts.main")

@section("container")
<div class="container" style="min-height: 100vh;">

@if (session()->has("success"))
    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
        {{session("success")}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has("loginError"))
    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
        {{session("loginError")}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <main class="form-signin w-100 m-auto mt-5 border bg-white rounded">
        <form action="/login" method="POST" class="text-center">
            @csrf
            <img src="/img/profile.svg" alt="" width="72" height="57">
            <h1 class="h3 text-center mb-3 fw-normal">Please Login</h1>

            <div class="form-floating">
            <input type="text" class="form-control @error('user')is-invalid @enderror" id="floatingInput" autocomplete="off" autofocus required placeholder="Username" name="user">
            <label for="floatingInput">Username</label>
            @error('user')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
            <div class="form-floating">
            <input type="password" required class="form-control rounded-top" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
        </form>
    </main>
</div>
@endsection