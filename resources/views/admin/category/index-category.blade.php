@extends('layouts.master')

@section ('title')
Data Kategori WIKBOOK
@endsection

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Kategori</h1>
    </div>
    <div class="section-body">
        <h3 class="section-title">List Kategori
            <a href="{{ route('createCategory') }}" title="Tambah Category"
            style="float: right; margin-right: 2%" class="btn btn-primary mr-1">Tambah Kategori</a>

            <a href="" title="Tambah Category"
            style="float: right; margin-right: 2%" class="btn btn-success mr-1">Export PDF</a>
        </h3>
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
            
          @if (session('destroy'))
            	<div class="container">    
                	<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    	{{ session ('destroy') }}
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
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($data as $dt)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dt->id}}</td>
                    <td>{{$dt->nama_kategori}}</td>
                    <td>
                        <a href="{{ route('destroyCategory', ['id' => $dt->id]) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('editCategory', ['id' => $dt->id]) }}" class="btn btn-info">Edit  </a>

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
