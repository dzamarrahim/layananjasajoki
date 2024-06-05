@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#cetak").click(function(e) {
            var tanggalMulai = $("#tanggal_mulai").val();
            var tanggalSelesai = $("#tanggal_selesai").val();
            var q = $("#q").val();
            params = "?page=laporan&tanggal_mulai=" + tanggalMulai + "&tanggal_selesai=" +
                tanggalSelesai + "&q=" + q;
            window.open("{{ route('laporan.index') }}" + params, '_blank');
        });
    });
</script>
@endsection
@section('konten')
<h1 class="h3 mb-3 text-center">Laporan Penjualan </h1>

<div class="col-md-12">

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Anda login sebagai : {{ auth()->user()->name }}</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="25%">Tanggal</th>
                        <th>Admin</th>
                        <th>Pelanggan</th>
                        <th>Total Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $laporan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $laporan->created_at->translatedFormat('d-m-Y') }}</td>
                        <td>{{ $laporan->user->name }}</td>
                        <td>{{ $laporan->pelanggan->nama }}</td>
                        <td>@money($laporan->total)</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-center fw-bold"><h1 class="h3 mb-3 text-center">TOTAL PENDAPATAN</h1></td>
                        <td class="text-end" class="h3 mb-3 text-center"><h1>@money($totalpenjualan)</h1></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

</div>
