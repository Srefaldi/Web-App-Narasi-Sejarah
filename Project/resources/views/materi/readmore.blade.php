@extends('layout.main')

{{-- <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <main class="px-3">
            <h1>Cover your page.</h1>

            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit
                the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
            </p>
        </main>
    </div> --}}


@section('content')
    <div class="container py-5">
        <div class="card shadow">
            <img src="{{ url('storage/' . $item->image) }}" alt="{{ $item->title }}" class="card-img-top">
            <div class="card-body">
                <h3 class="card-title">{{ $item->title }}</h3>
                <p class="card-text" type="html" id="desc">{!! htmlspecialchars_decode($item->description) !!}</p>
            </div>
        </div>
    </div>
@endsection
