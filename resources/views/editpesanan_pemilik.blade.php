@extends('Layouts.main')

@section('content')
    <main class="mt-5 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="/pemilik/update/{{ $n->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4 class="mb-3 fs-4 fw-bold text-center">Buat Pesanan Sampah</h4>
                                <div class="mb-3 row">
                                    <label for="berat" class="col-sm-4 col-form-label">Berat Sampah (kg)</label>
                                    <div class="col-sm-8">
                                        <input type="number" name='kg_sampah' class="form-control" id="berat"
                                            value="{{ $n->kg_sampah }}">
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="jns_smph" class="col-sm-4 col-form-label">Jenis Sampah</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Jenis Sampah" name="jns_smph">
                                            <option selected disabled>Pilih Jenis Sampah</option>
                                            <option value="Organik">Sampah Basah (Organik)</option>
                                            <option value="Anorganik">Sampah Padat (Anorganik)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="id_location" class="col-sm-4 col-form-label">Bank Sampah</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Bank Sampah" name="id_location">
                                            <option selected disabled>Pilih Bank Sampah</option>
                                            <option value=1 {{ $n->id_location == 1 ? 'selected' : '' }}>TPA Kota Baru
                                            </option>
                                            <option value=2 {{ $n->id_location == 2 ? 'selected' : '' }}>
                                                TPA Sampah Karanganyar</option>
                                            <option value=3 {{ $n->id_location == 3 ? 'selected' : '' }}>TPA Amplaz
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jenis" class="col-sm-4 col-form-label">Pilih Jam</label>
                                    <div class="col-sm-8">
                                        <!-- Improved radio buttons with spacing -->
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam" id="inlineRadio1"
                                                value="08.00" {{ $n->jam == '08.00' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">08.00</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam" id="inlineRadio2"
                                                value="09.30" {{ $n->jam == '09.30' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">09.30</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam" id="inlineRadio3"
                                                value="11.30" {{ $n->jam == '11.30' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio3">11.30</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam" id="inlineRadio4"
                                                value="13.30" {{ $n->jam == '13.30' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio4">13.30</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam" id="inlineRadio5"
                                                value="15.30" {{ $n->jam == '15.30' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio5">15.30</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input type="text" name='harga' class="form-control" id="harga" readonly>
                                        <div id="formattedHarga"></div>
                                    </div>
                                </div>

                                <div class="col-md-12 px-4 text-center mb-4">
                                    <button type="submit" class="btn btn-primary px-4" name="status"
                                        value="Process">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var beratInput = document.getElementById('berat');
            var hargaInput = document.getElementById('harga');
            var formattedHargaDiv = document.getElementById('formattedHarga');

            beratInput.addEventListener('input', function() {
                var berat = parseFloat(beratInput.value) || 0;
                var harga = calculateHarga(berat);
                hargaInput.value = harga; // Remove .toFixed(2) if harga is an integer

                // Format and display harga with Rupiah symbol
                formattedHargaDiv.innerText = formatRupiah(harga);
            });

            function calculateHarga(berat) {
                // You can define your pricing logic here
                // For example, let's say the price is $1.50 per kilogram
                var hargaPerKg = 5000;
                return Math.round(berat * hargaPerKg); // Round to the nearest integer
            }

            function formatRupiah(number) {
                // Format the number as Rupiah
                var rupiah = 'Rp ' + number.toLocaleString('id-ID');
                return rupiah;
            }
        });
    </script>
@endsection
