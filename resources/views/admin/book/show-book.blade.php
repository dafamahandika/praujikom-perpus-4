@extends('layouts.master')
@section ('title')
Detail Book
@endsection

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>{{ $book->title }}</h1>
    </div>
    <div class="section-body">
     <h3 class="section-title">Detail
      <a href="{{ route('indexBook') }}"
          style="float: right; margin-right: 2%" class="btn btn-primary mr-1">Back</a></h3>
        <div class="row"> 
            <div class="col">
              <div class="card">
                <div class="card-body d-flex justify-content-center gap-3"> 
                     <div>
                         <img src="/cover/{{ $book->cover_buku }}" class="card-img-top w-30"alt="{{ $book->cover_book }}" >
                    </div>
                    <div class="mt-auto">
                         <ul>
                              <h3>{{ $book->judul }}</h3>
                              <p>Kategori: {{ $book->category->nama_kategori }}</p>
                              <p>Penulis: {{ $book->penulis }}</p>
                              <p>Penerbit : {{ $book->penerbit }}</p>
                              <p>Tahun Terbit : {{ $book->tahun_terbit }}</p>
                         </ul>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
@endsection