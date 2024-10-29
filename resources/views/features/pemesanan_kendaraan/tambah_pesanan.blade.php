@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header">
            <strong>Add Pesanan Baru</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('tambahPesanKendaraan') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="tanggal_pemesanan" class="form-label">Untuk Tanggal</label>
                    <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan">
                </div>
                <div class="mb-3">
                    <label for="jenis_kepemilikan" class="form-label">Jenis Kepemilikan Kendaraan</label>
                    <select class="form-select" name="jenis_kepemilikan" id="jenis_kepemilikan" required>
                        <option selected value="">Pilih salah satu</option>
                        <option value="Milik Perusahaan">Milik Perusahaan</option>
                        <option value="Sewa">Sewa</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                    <select class="form-select" name="jenis_kendaraan" id="jenis_kendaraan" required>
                        <option selected value="">Pilih salah satu</option>
                        <option value="Angkutan Barang">Angkutan Barang</option>
                        <option value="Angkutan Orang">Angkutan Orang</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kendaraan" class="form-label">Nama Kendaraan</label>
                    <select class="form-select" name="kendaraan" id="kendaraan" required>
                        <option selected value="">Pilih salah satu</option>
                        @foreach ($kendaraan as $kendaraan)
                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama_kendaraan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="driver" class="form-label">Driver</label>
                    <select class="form-select" name="driver" id="driver" required>
                        <option selected value="">Pilih salah satu</option>
                        @foreach ($driver as $driver)
                            <option value="{{ $driver->id }}"> {{ $driver->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="penyetuju" class="form-label">Penyetuju</label>
                    <select class="form-select" name="penyetuju" id="penyetuju" required>
                        <option selected value="">Pilih salah satu</option>
                        @foreach ($penyetuju as $penyetuju)
                            <option value="{{ $penyetuju->id }}"> {{ $penyetuju->name }} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="form-control btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.form-select').select2({
                width: '100%',
                placeholder: 'Pilih salah satu'
            });

            function getKendaraan() {
                const jenisKepemilikan = $('#jenis_kepemilikan').val();
                const jenisKendaraan = $('#jenis_kendaraan').val();

                console.log(jenisKendaraan);
                console.log(jenisKepemilikan);

                $('#kendaraan').empty();

                if (!(jenisKendaraan && jenisKepemilikan)) {
                    return;
                }

                $.ajax({
                    url: `/cari-kendaraan?jenis_kepemilikan=${jenisKepemilikan}&jenis_kendaraan=${jenisKendaraan}`,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.status === "success") {
                            $.each(res.data, function(key, data) {
                                $('#kendaraan').append('<option value="' + data.id + '">' + data
                                    .nama_kendaraan + '</option>');
                                $('#kendaraan').select2({
                                    width: '100%',
                                    placeholder: 'Pilih salah satu'
                                });
                            });
                        } else {

                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            }

            $('#jenis_kepemilikan').on('change', getKendaraan);
            $('#jenis_kendaraan').on('change', getKendaraan);
        });
    </script>
@endsection
