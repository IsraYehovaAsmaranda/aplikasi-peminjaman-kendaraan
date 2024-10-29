@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header">
            <strong>Pemesanan Kendaraan</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('laporanPemesananPage') }}" method="get">
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggal_awal" id="tanggal_akhir" required />
                    </div>
                    <div class="mb-3 col-6">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required />
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Lihat Laporan</button>
                </div>
            </form>
            @if (isset($jsonRingkasan))
                <table id="datatable" class="display responsive nowrap">
                    <thead>
                        <th>Tanggal</th>
                        <th>Total Pesanan</th>
                        <th>Total Pending</th>
                        <th>Total Disetujui</th>
                        <th>Total Ditolak</th>
                        <th>Jumlah Milik Perusahaan</th>
                        <th>Jumlah Sewa</th>
                        <th>Jenis Angkutan Orang</th>
                        <th>Jenis Angkutan Barang</th>
                    </thead>
                    <tbody>
                        @foreach ($jsonRingkasan as $ringkasan)
                            <tr>
                                <td> {{ $ringkasan->tanggal }} Pesanan </td>
                                <td> {{ $ringkasan->total_pesanan }} Pesanan </td>
                                <td> {{ $ringkasan->total_pending }} Pesanan </td>
                                <td> {{ $ringkasan->total_disetujui }} Pesanan </td>
                                <td> {{ $ringkasan->total_ditolak }} Pesanan </td>
                                <td> {{ $ringkasan->kendaraan_milik_perusahaan }} Pesanan </td>
                                <td> {{ $ringkasan->kendaraan_sewa }} Pesanan </td>
                                <td> {{ $ringkasan->kendaraan_angkutan_orang }} Pesanan </td>
                                <td> {{ $ringkasan->kendaraan_angkutan_barang }} Pesanan </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                searching: false,
            });
        });
    </script>
@endsection
