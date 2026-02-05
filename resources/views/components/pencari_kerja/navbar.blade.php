<nav  class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <span class="app-brand-text demo menu-text fw-bold text-white me-5">
            Career Center
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-ex-7">
            <div class="navbar-nav me-auto ms-4">
                <a class="nav-item nav-link active" href="javascript:void(0)">Home</a>
                <a class="nav-item nav-link" href="javascript:void(0)">About</a>
                <a class="nav-item nav-link" href="javascript:void(0)">Loker</a>
            </div>
            <div class="navbar-nav ms-lg-auto" id="navbar-ex-15">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                            data-trigger="hover">Login</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.login')}}">Admin</a>
                            <a class="dropdown-item" href="{{route('perusahaan.login')}}">Perusahaan</a>
                            <a class="dropdown-item" href="{{route('pencarikerja.login')}}">Pencari Kerja</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)"><i class="icon-base navbar-icon bx bx-user"></i>
                            Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>