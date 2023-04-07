
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:#202f5b">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center text-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link {{($title === 'home') ? 'active' : ''}}" aria-current="page" href="/"><div class="{{($title === 'home') ? 'active2' : ''}}"></div> Home</a>
        <a class="nav-link {{($title === 'galeri') ? 'active' : ''}}" href="/galeri"><div class="{{($title === 'galeri') ? 'active2' : ''}}"></div>Galeri</a>
        <a class="nav-link {{($title === 'berita') ? 'active' : ''}}" href="/berita"><div class="{{($title === 'berita') ? 'active2' : ''}}"></div>Berita</a>
        <a class="nav-link {{($title === 'lomba') ? 'active' : ''}}" href="/categories/lomba"><div class="{{($title === 'lomba') ? 'active2' : ''}}"></div>Lomba</a>

        <a class="nav-link {{($title === 'struktur') ? 'active' : ''}}" href="/struktur"><div class="{{($title === 'struktur') ? 'active2' : ''}}"></div>Struktur</a>
      </div>
    </div>
    @auth
    <div class="dropdown">
      <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Welcome {{auth()->user()->user}}
      </a>
      <ul class="dropdown-menu pb-0">
        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
          </form>
        </li>
      </ul>
    </div>



    @else

    <a class="nav-link justify-content-end text-light p-1" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
    @endauth
  </div>
</nav>
