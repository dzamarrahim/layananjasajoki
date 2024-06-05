@extends('layouts.template')
@section('judulh1','Admin - Dashboard')

@section('konten')

<div class="container-fluid">

    <!-- =========================================================== -->
    <h1 class="h3 mb-1">
        <strong>Layanan</strong> Tercatat
    </h1>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-none">
                <span class="info-box-icon bg-info"><img src="{{ asset('dist/img/ml.jpeg')}}" alt="AdminLTE Logo"></span>

                <div class="info-box-content">
                    <span class="info-box-text">Mobile Legends</span>
                    <span class="info-box-number">Rp. 200.000</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Software</span>
                    <span class="info-box-number">Small</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow">
                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jasa</span>
                    <span class="info-box-number">Regular</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-lg">
                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Barang</span>
                    <span class="info-box-number">Large</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- =========================================================== -->
    <div class="container-fluid p-0">
        <h1 class="h3 mb-2 mt-3">
            <strong>Transaksi</strong> Tercatat
        </h1>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body info-box-icon bg-primary">
                        <div class="row ">
                            <div class="col mt-0 mb-4">
                                <h5 class="card-title-">
                                    Pendapatan Harian
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="truck"></i>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-3 mb-3">
                        @money($totalpenjualan)
                        </h2>
                        <div class="mb-0">
                            <span class="text">
                                <i class="mdi mdi-arrow-bottom-right"></i>
                                
                            </span>
                            <span class="text">Since <strong>Last Month</strong></span>
                        </div>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body info-box-icon bg-success">
                        <div class="row ">
                            <div class="col mt-0 ">
                                <h5 class="card-title-">
                                    Pendapatan Bulanan
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="truck"></i>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-3 mb-3">
                            Rp. 20.000.000
                        </h2>
                        <div class="mb-0">
                            <span class="text">
                                <i class="mdi mdi-arrow-bottom-right"></i>
                                -3.65%
                            </span>
                            <span class="text">Since <strong>Last Month</strong></span>
                        </div>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body info-box-icon bg-warning">
                        <div class="row ">
                            <div class="col mt-0 ">
                                <h5 class="card-title-">
                                    Pendapatan Tahunan
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="truck"></i>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-3 mb-3">
                            Rp. 53.000.000
                        </h2>
                        <div class="mb-0">
                            <span class="text">
                                <i class="mdi mdi-arrow-bottom-right"></i>
                                -3.65%
                            </span>
                            <span class="text">Since <strong>Last Month</strong></span>
                        </div>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body info-box-icon bg-danger">
                        <div class="row ">
                            <div class="col mt-0 mb-4">
                                <h5 class="card-title-">
                                    Total Pendapatan
                                </h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="truck"></i>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-3 mb-3">
                            Rp. 67.000.000
                        </h2>
                        <div class="mb-0">
                            <span class="text">
                                <i class="mdi mdi-arrow-bottom-right"></i>
                                -3.65%
                            </span>
                            <span class="text">Since <strong>Last Month</strong></span>
                        </div>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>





        <!-- =========================================================== -->
        <h1 class="h3 mb-1 mt-3">
            <strong>Transaksi</strong> Terakhir
        </h1>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Transaksi</th>
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach($datatransaksi as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->invoice }}</td>
                        <td>{{ $dt->created_at }}</td>
                        <td>{{ $dt->pelanggan->nama }}</td>
                        <td>@money($dt->total)</td>
                        
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>




        <!-- =========================================================== -->
        <h1 class="h3 mb-1 mt-3">
            <strong>Administrasi</strong> Tercatat
        </h1>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$user}}</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$pelanggan}}</h3>

                <p>Pelanggan</p>
              </div>
              <div class="icon">
              <i class="fa fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$layanan}}</h3>

                <p>Layanan</p>
              </div>
              <div class="icon">
              <i class="fa fa-store"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


    @endsection
