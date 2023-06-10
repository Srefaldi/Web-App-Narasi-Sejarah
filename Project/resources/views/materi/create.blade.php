@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Materi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Materi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('materi.store') }}" method="POST">

                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Materi</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title">Judul Materi</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Masukkan Judul">
                                            @error('title')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="image">Masukkan Foto</label>
                                                <input type="file" accept="image/*" class="form-control" id="image"
                                                    name="image" placeholder="Masukkan Foto">
                                                @error('title')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea type="text" cols="30" rows="10" class="form-control" id="description" name="description"
                                                        placeholder="Masukkan Materi"></textarea>
                                                    @error('title')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </form>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
