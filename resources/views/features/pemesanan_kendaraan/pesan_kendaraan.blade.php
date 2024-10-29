@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header">
            <strong>Pemesanan Kendaraan</strong>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('addPesanKendaraanPage') }}" role="button" class="btn btn-primary">Tambah Pemesanan</a>
            </div>
            <table id="datatable" class="display responsive nowrap">
                <thead>
                    <th>Nama Kendaraan</th>
                    <th>Driver</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Pihak Penyetuju</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Pengaju</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($dataPesanan as $pesanan)
                        <tr>
                            <td> {{ $pesanan->kendaraan->nama_kendaraan }} </td>
                            <td> {{ $pesanan->driver->name }} </td>
                            <td> {{ $pesanan->tanggal_pemesanan }} </td>
                            <td> {{ $pesanan->penyetuju->name }} </td>
                            <td> {{ $pesanan->created_at }} </td>
                            <td> {{ $pesanan->pengaju->name }} </td>
                            <td> {{ $pesanan->statusPesanan->nama_status }} </td>
                            <td>
                                @if ($pesanan->status == 1)
                                    @if (Auth::user()->role_id == 1)
                                        <a href="/pesankendaraan/update/{{ encrypt($pesanan->id) }}" role="button"
                                            class="btn btn-warning">Edit</a>
                                    @else
                                        @if ($pesanan->penyetuju->id == Auth::id())
                                            <form action="/pesankendaraan/verify/{{ encrypt($pesanan->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success" name="verifikasi"
                                                    value="2">Verifikasi</button>
                                                <button type="submit" class="btn btn-danger" name="verifikasi"
                                                    value="3">Tolak</button>
                                            </form>
                                        @else
                                            <button class="btn btn-secondary disabled">Tidak memiliki akses</button>
                                        @endif
                                    @endif
                                @else
                                    <button class="btn btn-secondary disabled">Telah diverifikasi</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
