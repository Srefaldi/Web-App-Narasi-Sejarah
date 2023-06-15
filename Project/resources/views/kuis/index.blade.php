<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arsha Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('Arsha/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('Arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Arsha/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">Narasi Sejarah</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href=" {{ route('logout') }}">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <br>
    <br>
    <!-- about section start -->
    <div class="container mb-3" style="margin-top: 70px">
        <div class="text-center">
            <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
            <br>
            <h3>KUIS NANDE NANDE</h3>
        </div>

        <div class="text-right">
            @if (auth()->user()->level == 'admin')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">
                    Tambah Soal
                </button>
            @endif
        </div>


        <div class="container-sm mt-5 text-left" style="width: 50%">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @foreach ($items as $item)
                <div class="container mt-4" style="background-color: #655DBB; border-radius: 10px; padding: 10px">
                    <h5 style="color: #ECF2FF">{{ $item->soal }}</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1" style="color: #ECF2FF">
                            {{ $item->option_a }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2" style="color: #ECF2FF">
                            {{ $item->option_b }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3" style="color: #ECF2FF">
                            {{ $item->option_c }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4" style="color: #ECF2FF">
                            {{ $item->option_d }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                        <label class="form-check-label" for="flexRadioDefault5" style="color: #ECF2FF"> Jawaban :
                            {{ $item->Jawaban }}
                        </label>
                    </div>



                    {{-- ADMIN --}}
                    
                    <div class="mt-3">
                        @if (auth()->user()->level == 'admin')
                            <form action="{{ route('mulaikuis.destroy', $item->id) }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editItem{{ $item->id }}">
                                Edit
                            </button>
                        @endif
                    </div>

                </div>

                <!-- Modal Edit -->
                <div class="modal" id="editItem{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Soal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('mulaikuis.update', $item->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="title">Soal</label>
                                        <input type="text" class="form-control" name="soal" id="title"
                                            value="{{ $item->soal }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Option A</label>
                                        <input type="text" name="option_a" id="option_a" cols="10"
                                            rows="5" class="form-control" value="{{ $item->option_a }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Option B</label>
                                        <input type="text" name="option_b" id="option_b" cols="10"
                                            rows="5" class="form-control" value="{{ $item->option_b }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Option C</label>
                                        <input type="text" name="option_c" id="option_c" cols="10"
                                            rows="5" class="form-control" value="{{ $item->option_c }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Option D</label>
                                        <input type="text" name="option_d" id="option_d" cols="10"
                                            rows="5" class="form-control" value="{{ $item->option_d }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description">Jawaban</label>
                                        <input type="text" name="Jawaban" id="Jawaban" cols="10"
                                            rows="5" class="form-control" value="{{ $item->Jawaban }}">
                                    </div>

                                    <button class="btn btn-primary" type="submit">Edit Kuis</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal" id="addItem" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Soal Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('mulaikuis.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title">Soal</label>
                                <textarea class="form-control" name="soal" id="soal" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description">Option A</label>
                                <input type="text" name="option_a" id="option_a" cols="10" rows="5"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description">Option B</label>
                                <input type="text" name="option_b" id="option_b" cols="10" rows="5"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description">Option C</label>
                                <input type="text" name="option_c" id="option_c" cols="10" rows="5"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description">Option D</label>
                                <input type="text" name="option_d" id="option_d" cols="10" rows="5"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description">Jawaban</label>
                                <input type="text" name="Jawaban" id="Jawaban" cols="10" rows="5"
                                    class="form-control">
                            </div>
                            <button class="btn btn-primary" type="submit">Tambah Soal</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="{{ asset('Arsha/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
