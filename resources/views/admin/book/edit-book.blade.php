@extends('layouts.master')
@section ('title')
Edit Buku 
@endsection

@section('content');
  <section class="section">
    <div class="section-header">
      <h1>Edit Data Buku</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Edit Data Buku</a></div>
      </div>
    </div>

    <div class="section-body">
     @if ($message = Session::get('fail'))
          <div class="alert alert-danger d-flex justify-content-center" width="15" height="10" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="danger:"><use xlink:href="#check-circle-fill"/></svg>
                    {{$message}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
          </div>
     @endif
      <h2 class="section-title">Edit Data Buku</h2>
      <p class="section-lead"></p>
      <br>
      <form method="POST" action="{{ route('updateBook', ['id' => $book->id]) }}" enctype="multipart/form-data">   
        @csrf
        <div class="row"> 
            <div class="col">
                <div class="card">
                    <div class="card-header">
                    <h4>Form Buku</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-sm-12">
                                <label>Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ $book->judul }}">
                                   @error('judul')
                                        <div class="text-danger">{{ $message }}</div>
                                   @enderror
                            </div>
                        </div>
                        
                        <div class="row align-items-start">
                            <div class="col-sm-12">
                                <label>Penulis</label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" name="penulis" value="{{ $book->penulis }}">
                                   @error('penulis')
                                        <div class="text-danger">{{ $message }}</div>
                                   @enderror
                            </div>
                        </div>
                        
                        <div class="row align-items-start">
                            <div class="col-sm-12">
                                <label>Penerbit</label>
                                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{ $book->penerbit }}">
                                   @error('penerbit')
                                        <div class="text-danger">{{ $message }}</div>
                                   @enderror
                            </div>
                        </div>
                        
                        <div class="row align-items-start">
                            <div class="col-sm-12">
                                <label>Tahun Terbit</label>
                                <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror" name="tahun_terbit" value="{{ $book->tahun_terbit }}">
                                   @error('tahun_terbit')
                                        <div class="text-danger">{{ $message }}</div>
                                   @enderror
                            </div>
                        </div>

                        <label>Kategori</label>
                                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror"  required>
                                  <option hidden>{{ $book->category->nama_kategori }}</option> 
                                  @foreach( $category as $dt)
                                  <option value="{{ $dt->id }}">{{ $dt->nama_kategori }}</option>
                                  @endforeach
                                </select>
                                  @error('kategori')
                                    <div class="text-danger">{{ $message }}</div>
                                  @enderror
                         
                         <div class="row align-items-start">
                              <div class="col-sm-12">
                                   <label>Cover Buku</label>
                                   <input type="file" class="form-control @error('cover_buku') is-invalid @enderror" name="cover_buku" placeholder="Cover Buku">
                                   
                                   @error('cover_buku')
                                    <div class="text-danger">{{ $message }}</div>
                                   @enderror
                              </div>
                         </div>
                        
                         <div class="row align-items-start">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                              <button class="btn btn-block btn-primary">Edit</button>    
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
  </section>
@endsection
     