@extends('user.layout.master')

@section('content') 
     <!-- Header-->
     <header class="bg-primary py-5">
          <div class="container px-4 px-lg-5 my-5">
              <div class="text-center">
                  <h1 class="display-4 fw-bolder">{{ Auth::user()->username }} History</h1>
                  <p class="lead fw-normal mb-0">Find your favorite book in WIKBOOK</p>
              </div>
          </div>
      </header>
      <!-- Section-->
     @if (session('success'))
     <div class=" m-4 text-center alert alert-success alert-dismissible" role="alert">
          {{ session('success') }}
     </div>
     @endif
     <section class="py-5">
          <div class="container px-4 px-lg-5 ">
               <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <table id="data-admin" class="table table-striped table-bordered table-md text-center" style="width: 100%;" cellspacing="1">
                         <thead>
                              <tr>
                                   <th>#</th>
                                   <th>Peminjam</th>
                                   <th>Judul</th>
                                   <th>Tanggal Pinjam</th>
                                   <th>Tanggal Kembali</th>
                                   <th>Status Peminjaman</th>
                                   <th>Return</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $i = 1;?>
                              @foreach($history as $dt)
                              <tr>
                                   <td>{{$i++}}</td>
                                   <td>{{$dt->user->username}}</td>
                                   <td>{{$dt->book->judul}}</td>
                                   <td>{{$dt->tanggal_pinjam}}</td>
                                   <td>{{$dt->tanggal_kembali}}</td>
                                   <td>{{$dt->status_peminjaman}}</td>
                                   <td>
                                        @if($dt->status_peminjaman == "Belum Kembali")
                                        <form action="{{ route('returnBorrow', $dt->book->id) }}" method="POST">
                                             @csrf
                                             <button class="btn btn-warning">Return</button>
                                        </form>
                                        @else
                                             <a class="btn btn-success" >Sudah</a>
                                        @endif
                                   </td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>          
     </section>
@endsection