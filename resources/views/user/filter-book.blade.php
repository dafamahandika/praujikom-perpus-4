@extends('user.master')

@section('list')
<li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
         @foreach($categories as $category)
         <li><a class="dropdown-item" href="{{ route('filterBook', ['id'=>$category->id]) }}">{{ $category->category_name}}</a></li>
         @endforeach
     </ul>
 </li>
@endsection

@section('content')
     <!-- Header-->
     <header class="bg-dark py-5">
          <div class="container px-4 px-lg-5 my-5">
              <div class="text-center text-white">
                  <h1 class="display-4 fw-bolder">WIKBOOK | {{ Auth::user()->username }}</h1>
                  <p class="lead fw-normal text-white-50 mb-0">Find your favorite book in WIKBOOK</p>
              </div>
          </div>
      </header>
      <!-- Section-->
     @if($books)
          <section class="py-5">
               <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                         @foreach($books as $book)
                              <div class="col mb-5">
                                   <div class="card h-100" style="width:300px">
                                        <img class="card-img-top" src="{{ asset('cover/'.$book->cover_buku) }}" alt="{{ $book->cover_book }}" width="200px" height="350px"/>
                                        <div class="card-body p-3">
                                             <div class="text-center">
                                                  <h5 class="fw-bolder fs-6">{{ $book->title }}</h5>
                                                  <hr>
                                                  <p>{{ $book->author }}</p>
                                                  <p>Category : {{ $book->category->category_name }}</p>
                                             </div>
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                             <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('showBook', ['id'=>$book->id]) }}">Read</a></div>
                                        </div>
                                   </div>
                              </div>
                         @endforeach
                    </div>
               </div>          
          </section>
          @else
          <section class="py-5">
               <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                         <h1 class="text-center fw-bold text-danger">Book Not Found</h1>
                    </div>
               </div>          
          </section>
     @endif
@endsection