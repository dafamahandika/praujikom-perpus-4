@extends('user.layout.master')

@section('content') 
     <!-- Header-->
     <header class="bg-primary py-5">
          <div class="container px-4 px-lg-5 my-5">
              <div class="text-center">
                  <h1 class="display-4 fw-bolder">{{ Auth::user()->username }} Collection</h1>
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
                    @foreach($collection as $dt)
                         <div class="col mb-5">
                              <div class="card h-100" style="width:300px">
                                   <img class="card-img-top" src="{{ asset('cover/'.$dt->book->cover_buku) }}" width="200px" height="350px" alt="{{ $dt->book->cover_buku }}"/>
                                   <div class="card-body p-3">
                                        <div class="text-center">
                                             <h4 class="fw-bolder">{{ $dt->book->judul }}</h4>
                                             <hr>
                                             <p>{{ $dt->book->penulis }} | {{ $dt->book->tahun_terbit }}</p>
                                             <div class="d-flex flex-column">
                                                  <p>Penerbit: {{ $dt->book->penerbit }}</p>
                                                  <a class="fw-bold fs-5 text-bold text-decoration-none" href="{{ route('indexReview', $dt->book->id) }}">See Review</a>
                                             </div>
                                        </div>
                                   </div>
                                   <!-- Product actions-->
                                   <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center d-flex justify-content-center flex-wrap gap-2">
                                             <a class="btn btn-info m-auto" href="{{ route('showBook', $dt->book->id) }}">Detail</a>
                                             <form action="{{ route('storeCollection', $dt->book->id) }}" method="POST">
                                                       @csrf
                                                       <button class="btn btn-primary" >Simpan</button>
                                                  </form>
                                                  @if($dt->book->status == 1 )
                                                  <form action="">
                                                       @csrf
                                                       <button class="btn btn-success" disabled>Pinjam</button>
                                                  </form>
                                                  @else
                                                  <form action="{{ route('storeBorrow', $dt->book->id) }}" method="POST">
                                                       @csrf
                                                       <button class="btn btn-success">Pinjam</button>
                                                  </form>
                                                  @endif
                                        </div>
                                   </div>
                              </div>
                         </div>
                    @endforeach
               </div>
          </div>          
     </section>
@endsection