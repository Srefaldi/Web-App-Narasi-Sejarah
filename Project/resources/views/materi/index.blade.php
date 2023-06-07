@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Materi</li>
                            <a href="{{ route('materi.store') }}" class="btn btn-primary">Tambah Data</a>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <!-- ======= Our Services Section ======= -->
        <section id="services" class="services sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Materi</h2>
                    <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id
                        nobis omnis tiledo stran delop</p>
                </div>

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                    @foreach ($materis as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item  position-relative">
                                <img src="{{ url('storage/' . $item->image) }}" alt="">
                                <h3>{{ $item->title }}</h3>
                                <p>{{ $item->description }}</p>
                                <a href="#" class="readmore stretched-link">Read more <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Service Item -->
                </div>

            </div>
        </section><!-- End Our Services Section -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
