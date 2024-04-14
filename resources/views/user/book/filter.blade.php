@extends('user.layout.master')

@section('list')
<li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
         @foreach($category as $dt)
         <li><a class="dropdown-item" href="{{ route('filterBook', $dt->id)}}"> {{ $dt->nama_kategori}}</a></li>
         @endforeach
     </ul>
 </li>
@endsection

@section('content') 
     <!-- Header-->
     <header class="bg-primary py-5">
          <div class="container px-4 px-lg-5 my-5">
              <div class="text-center">
                  <h1 class="display-4 fw-bolder">WIKBOOK | {{ Auth::user()->username }}</h1>
                  <p class="lead fw-normal mb-0">Find your favorite book in WIKBOOK</p>
              </div>
          </div>
      </header>
          @if (session('error'))
               <div class="m-4 text-center alert alert-danger alert-dismissible" role="alert">
                    {{ session('error') }}
               </div>
          @endif
          @if (session('success'))
               <div class=" m-4 text-center alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
               </div>
          @endif
      <!-- Section-->
     <section class="py-5">
          <div class="container px-4 px-lg-5 mt-5">
               <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> 
                    {{-- @foreach($books as $dt)
          
                    <p>{{ $books->book->cover_buku }}</p>   
                         
                    @endforeach                --}}
                    @foreach($books->book as $book)
                         <div class="col mb-5">
                              <div class="card h-100" style="width:300px">
                                   <img class="card-img-top" src="{{ asset('cover/'.$book->cover_buku) }}" width="200px" height="350px" alt="{{ $book->cover_buku }}"/>
                                   <div class="card-body p-3">
                                        <div class="text-center">
                                             <h4 class="fw-bolder">{{ $book->judul }}</h4>
                                             <hr>
                                             <p>{{ $book->penulis }} | {{ $books->nama_kategori }} | {{ $book->tahun_terbit }}</p>
                                             <hr>
                                             <div class="d-flex flex-column">
                                                  <p>Penerbit: {{ $book->penerbit }}</p>
                                                  <a class="fw-bold fs-5 text-bold text-decoration-none" href="{{ route('indexReview', $book->id) }}">See Review</a>
                                             </div>
                                        </div>
                                   </div>
                                   <!-- Product actions-->
                                   <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="d-flex">
                                             <div class="d-flex justify-content-center flex-wrap gap-2">
                                                  <a class="btn btn-info" href="{{ route('showBook', $book->id) }}">Detail</a>
                                                  <form action="{{ route('storeCollection', $book->id) }}" method="POST">
                                                       @csrf
                                                       <button class="btn btn-primary" >Simpan</button>
                                                  </form>
                                                  @if($book->status == 1 )
                                                  <form action="">
                                                       @csrf
                                                       <button class="btn btn-success" disabled>Pinjam</button>
                                                  </form>
                                                  @else
                                                  <form action="{{ route('storeBorrow', $book->id) }}" method="POST">
                                                       @csrf
                                                       <button class="btn btn-success">Pinjam</button>
                                                  </form>
                                                  @endif
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    @endforeach
               </div>
          </div>          
     </section>
@endsection