@extends('layouts.master')

@section ('title')
Data Peminjam WIKBOOK
@endsection

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Data Peminjaman</h1>
    </div>
    <div class="section-body">
        <h3 class="section-title">List Peminjaman
            {{-- <a href="{{ route('createUser') }}" title="Tambah Petugas"
            style="float: right; margin-right: 2%" class="btn btn-success mr-1">Tambah Petugas</a> --}}
        </h3>
        <table id="data-admin" class="table table-striped table-bordered table-md text-center"
            style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Peminjam</th>
                    <th>Judul</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @foreach($borrow as $dt)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$dt->user->username}}</td>
                    <td>{{$dt->book->judul}}</td>
                    <td>{{$dt->tanggal_pinjam}}</td>
                    <td>{{$dt->tanggal_kembali}}</td>
                    <td>{{$dt->status_peminjaman}}</td>
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
