@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header">
            <strong>Add Pesanan Baru</strong>
        </div>
        <div class="card-body">
            <form action="/pesankendaraan/{{ encrypt($id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tanggal_pemesanan" class="form-label">Untuk Tanggal</label>
                    <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan"
                        value="{{ $pesanan->tanggal_pemesanan }}">
                </div>
                <div class="mb-3">
                    <label for="jenis_kepemilikan" class="form-label">Jenis Kepemilikan Kendaraan</label>
                    <select class="form-select" name="jenis_kepemilikan" id="jenis_kepemilikan" required>
                        <option selected value="">Pilih salah satu</option>
                        <option value="Milik Perusahaan"
                            {{ $pesanan->kendaraan->jenis_kepemilikan == 'Milik Perusahaan' ? 'selected' : '' }}>Milik
                            Perusahaan</option>
                        <option value="Sewa" {{ $pesanan->kendaraan->jenis_kepemilikan == 'Sewa' ? 'selected' : '' }}>Sewa
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                    <select class="form-select" name="jenis_kendaraan" id="jenis_kendaraan" required>
                        <option selected value="">Pilih salah satu</option>
                        <option value="Angkutan Barang"
                            {{ $pesanan->kendaraan->jenis_kendaraan == 'Angkutan Barang' ? 'selected' : '' }}>Angkutan
                            Barang</option>
                        <option value="Angkutan Orang"
                            {{ $pesanan->kendaraan->jenis_kendaraan == 'Angkutan Orang' ? 'selected' : '' }}>Angkutan Orang
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kendaraan" class="form-label">Nama Kendaraan</label>
                    <select class="form-select" name="kendaraan" id="kendaraan" required>
                        <option selected value="">Pilih salah satu</option>
                        @foreach ($kendaraan as $kendaraan)
                            <option value="{{ $kendaraan->id }}"
                                {{ $pesanan->kendaraan->id == $kendaraan->id ? 'selected' : '' }}>
                                {{ $kendaraan->nama_kendaraan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="driver" class="form-label">Driver</label>
                    <select class="form-select" name="driver" id="driver" required>
                        <option selected value="">Pilih salah satu</option>
                        @foreach ($driver as $driver)
                            <option value="{{ $driver->id }}"
                                {{ $pesanan->driver->id == $driver->id ? 'selected' : '' }}>
                                {{ $driver->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="penyetuju" class="form-label">Penyetuju</label>
                    <select class="form-select" name="penyetuju" id="penyetuju" required>
                        <option selected value="">Pilih salah satu</option>
                        @foreach ($penyetuju as $penyetuju)
                            <option value="{{ $penyetuju->id }}"
                                {{ $pesanan->penyetuju->id == $penyetuju->id ? 'selected' : '' }}> {{ $penyetuju->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="form-control btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
