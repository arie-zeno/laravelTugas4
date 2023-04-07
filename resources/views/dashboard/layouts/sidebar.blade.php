<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard') ? 'active' : '' }} " aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/posts') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Berita
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/fotos') ? 'active' : '' }}" href="/dashboard/fotos">
            <span data-feather="image" class="align-text-bottom"></span>
            Foto
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/komens') ? 'active' : '' }}" href="/dashboard/komens">
            <span data-feather="message-square" class="align-text-bottom"></span>
            Komen
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/strukturs') ? 'active' : '' }}" href="/dashboard/strukturs">
            <span data-feather="box" class="align-text-bottom"></span>
            Struktur
          </a>
        </li>
      </ul>

    </div>
  </nav>