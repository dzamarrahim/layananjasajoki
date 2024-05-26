@extends('layouts.template')
@section('judulh1','Jasa Joki - Pelanggan')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Pelanggan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pelanggan.store')}}" method="POST">
            @csrf

            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Pelanggan">
                </div>
                <div class="form-group">
                    <label for="no_pelanggan">No Telepon</label>
                    <input type="number" class="form-control" id="no_pelanggan" name="no_pelanggan" Placeholder="Nomor Telepon">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class=" form-control" rows="4" placeholder="Alamat Pelanggan"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
