@extends('user.layout.master')

@section('content')
<section class="section" id="about">
    <div class="container m-3">
        <a href="{{ route('indexBook') }}" class="btn btn-secondary text-light mt-2">Back</a>
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <img src="{{ asset('cover/'.$book->cover_buku) }}" class="rounded img-fluid d-block mx-auto w-75 h-50" alt="{{ $book->cover_buku }}">
            </div>
            <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                <div class="left-heading">
                    <h4>{{ $book->judul }}</h4>
                </div>
                <div class="left-text">
                    <ul class="list-unstyled">
                        <li class="p-1 fs-5"><strong>Kategori</strong>: {{ $book->category->nama_kategori }}</li>
                        <li class="p-1 fs-5"><strong>Penulis</strong>: {{ $book->penulis }}</li>
                        <li class="p-1 fs-5"><strong>Pernebit</strong>: {{ $book->penerbit }}</li>
                        <li class="p-1 fs-5"><strong>Tahun Terbit</strong>: {{ $book->tahun_terbit }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hr"></div>
            </div>
        </div>
    </div>
</section>
@endsection