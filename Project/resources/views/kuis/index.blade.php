@extends('layout.main')

@section('content')
    <div class="container mb-3" style="margin-top: 70px">
        <div class="text-center">
            <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
            <br>
            <h3>Kuis Flora, Fauna, dan Budaya di Pulau Kalimantan</h3>
        </div>

        <div class="text-right">
            @if (auth()->user()->level == 'admin')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItem">
                    Tambah Soal
                </button>
            @endif
        </div>

        <div class="text-center">
            {{-- <form action="{{ route('startkuis') }}" method="get" style="display: inline"> --}}
            <button class="btn btn-primary" data-bs-toggle="modal">
                Mulai Kuis
            </button>
            </form>
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
                                <h5 class="modal-title">Edit Fauna</h5>
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
                                        <input type="text" name="option_a" id="option_a" cols="10" rows="5"
                                            class="form-control" value="{{ $item->option_a }}">
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
@endsection
