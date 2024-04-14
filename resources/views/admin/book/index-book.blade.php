@extends('layouts.master')

@section ('title')
Data Buku WIKBOOK
@endsection

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Buku</h1>
    </div>
    <div class="section-body">
        <form action="" method="GET">
            <input type="text" name="search" id="" placeholder="Book Title">
            <button class="btn btn-primary">Search</button>
        </form>
        <h3 class="section-title">List Buku 
            <a href="{{ route('createBook') }}"
            style="float: right; margin-right: 2%" class="btn btn-primary mr-1">Tambah Buku</a>
            
            <a href="" title="Tambah Category"
            style="float: right; margin-right: 2%" class="btn btn-success mr-1">Export PDF</a>
        </h3>
        @if (session('destroy'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                <div class="text-center">
                    {{ session ('destroy') }}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('success'))
            	<div class="container">    
                	<div class="alert alert-success alert-dismissible fade show" role="alert">
                    	{{ session ('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                	</div>
            	</div>
        @endif
        
        @if (session('edit'))
            	<div class="container">    
                	<div class="alert alert-info alert-dismissible fade show" role="alert">
                    	{{ session ('edit') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                	</div>
            	</div>
        @endif
        
        <table id="data-admin" class="table table-striped table-bordered table-md text-center"
            style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Cover</th>
                    <th>Detail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($books as $dt)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dt->kategori_id}}</td>
                    <td>{{$dt->judul}}</td>
                    <td>{{$dt->penulis}}</td>
                    <td>{{$dt->penerbit}}</td>
                    <td>{{$dt->tahun_terbit}}</td>
                    <td>{{$dt->cover_buku}}</td>
                    <td><a href="{{ route('showBook', ['id' => $dt->id]) }}">Detail</a></td>
                    <td>
                        <div class="d-flex flex-row-mb-3 justify-content-center">
                            <a href="{{ route('destroyBook', ['id' => $dt->id]) }}" class="m-1 btn btn-danger">Delete</a>
                            <a href="{{ route('editBook', ['id' => $dt->id]) }}" class="m-1 btn btn-info">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<script src="../../admin/dataTables/js/jquery.dataTables.min.js"></script>
<script src="../../admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#data-admin').DataTable({
            "iDisplayLength": 25
        });
    });

</script>
@endsection
