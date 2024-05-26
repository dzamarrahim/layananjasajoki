@extends('layouts.template')
@section('judulh1','Admin - Layanan')

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

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Layanan</h3>
        </div>
        <!-- /.card-header -->


        <div class=" card-body">
            <table>
                <tr>
                    <th>Nama Layanan</th>
                    <td>:</td>
                    <td>{{ $layanan->nama }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>:</td>
                    <td>@money($layanan->harga)</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>:</td>
                    <td>{{ $layanan->description}}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
</div>
@endsection
