@extends('layouts.master')
@section ('title')
Edit Kategori 
@endsection

@section('content');
  <section class="section">
    <div class="section-header">
      <h1>Edit Data Kategori</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Edit Data Kategori</a></div>
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
      <h2 class="section-title">Edit Data Kategori</h2>
      <p class="section-lead"></p>
      <br>
      <form method="POST" action="{{ route('updateCategory', ['id' => $category->id]) }}" enctype="multipart/form-data">   
        @csrf
        <div class="row"> 
            <div class="col">
                <div class="card">
                    <div class="card-header">
                    <h4>Form Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-sm-12">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value ="{{ $category->nama_kategori }}">
                                   @error('nama_kategori')
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
     