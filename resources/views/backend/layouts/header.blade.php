<head>
<!-- Custom fonts for this template-->
<link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> 
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
{{-- <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}

<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
</head>

<header class='mb-0'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown me-1">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Mail</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">No new mail</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                @if (empty(Auth::user()->profile->name))
                                    <h6 class="mb-0 text-gray-600">{{ Auth::user()->username }}</h6>
                                @else
                                    <h6 class="mb-0 text-gray-600">{{ Auth::user()->profile->name }}</h6>
                                @endif
                                <p class="mb-0 text-sm text-success">Online</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md">
                                    @if (!empty(Auth::user()->profile->pas_foto))
                                        <img src="{{ url('storage/' . Auth::user()->profile->pas_foto) }}" alt="">
                                    @else
                                        @if (Auth::user()->jenis_kelamin == 'Laki-laki')
                                            <img src="{{ Vite::asset('public/images/faces/2.jpg') }}" alt="">
                                        @elseif (Auth::user()->jenis_kelamin == 'Perempuan')
                                            <img src="{{ Vite::asset('public/images/faces/5.jpg') }}" alt="">
                                        @else
                                            <img src="{{ Vite::asset('public/images/faces/1.jpg') }}" alt="">
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Hello, {{ strtok(Auth::user()->nama_lengkap, ' ') }}!</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a href="{{ route('data_profile') }}" class="dropdown-item"
                                href=""><i class="icon-mid bi bi-eye-fill me-2"></i>Lihat Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
