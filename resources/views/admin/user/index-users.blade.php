@extends('layouts.master')

@section ('title')
Data Pengguna WIKBOOK
@endsection

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Pengguna</h1>
    </div>
    <div class="section-body">
        <h3 class="section-title">List Pengguna
            <a href="{{ route('createUser') }}" title="Tambah Petugas"
            style="float: right; margin-right: 2%" class="btn btn-success mr-1">Tambah Petugas</a>
            <a href="{{ route('exportUserExcel') }}" title="Export"
            style="float: right; margin-right: 2%" class="btn btn-warning mr-1">Export</a>
        </h3>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                <div class="text-center">
                    {{ session ('success') }}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        @if (Session::has('destroy'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                <div class="text-center">
                    {{ session ('destroy') }}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table id="data-admin" class="table table-striped table-bordered table-md text-center"
            style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($users as $dt)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dt->username}}</td>
                    <td>{{$dt->email}}</td>
                    <td>{{$dt->alamat}}</td>
                    <td>{{$dt->role}}</td>
                    <td>
                        <a href="{{ route('destroyUser', ['id' => $dt->id]) }}" class="btn btn-danger">Delete</a>
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
