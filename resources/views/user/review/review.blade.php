@extends('user.layout.master')

@section('content')
@if (session('success'))
<div class=" m-4 text-center alert alert-success alert-dismissible" role="alert">
     {{ session('success') }}
</div>
@endif
<section class="section" id="about">
     <div class="container col mx-auto d-flex justify-content-center m-5">
          <div class="card h-100" style="width:30vw">
               <img class="card-img-top" src="{{ asset('cover/'.$book->cover_buku) }}" width="100px" height="500px" alt="{{ $book->cover_buku }}"/>
               <div class="card-body p-3">
                    <div class="text-center">
                         <h4 class="fw-bolder">{{ $book->judul }}</h4>
                         <hr>
                         <p>{{ $book->penulis }} | {{ $book->category->nama_kategori }} | {{ $book->tahun_terbit }}</p>
                         <hr>
                         <div class="d-flex flex-column">
                              <p>Penerbit: {{ $book->penerbit }}</p>
                         </div>
                    </div>
               </div>
          </div>
          <div class="container m-0" style="max-width: 30vw;">
               <div style="max-height:90vh; overflow-y:auto; scrollbar-width: thin; scrollbar-color: transparent transparent">
                    @foreach($review as $value)
                    <div class="card p-3 mb-3">
                         <h3>{{ $value->user->username }}</h3>
                         <p>{{ $value->review }}</p>
                         <div class="d-flex">
                         @for($i = 0; $i < $value->rating; $i++)
                         <i class="bi bi-star-fill text-warning"></i>
                         @endfor
                         </div>
                    </div>
                    @endforeach
               </div>
               <div class="card " style="padding: 35px; max-width: 436px; padding-right: 10px;">
                    <form action="{{ route('storeReview', $book->id) }}" class="d-flex row justify-content-around" method="POST">
                         @csrf
                         <div class="row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('review') is-invalid @enderror mb-3" name="review" placeholder="Review">
                                @error('review    ')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="rating" class="mb-3 d-flex">Rating
                                     <input type="range" min="0" max="5" onchange="showRangeValue(this.value);" class="ms-1">
                                     <input type="text" id="rating" name="rating" class="ms-1" style="width:25px; background: none; border: none; outline: none;">
                                </label>
                            </div>
                        </div>
                        <div class="row col-sm-4">
                              <button class="btn btn-block btn-primary">Simpan</button>    
                        </div>      
                    </form>
               </div>
          </div>
     </div>
</section>
@endsection