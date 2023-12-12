@extends('Layouts.main')

@section('content')
    <main class="mt-5 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <h2 class="mb-4 fs-4 fw-bold text-center w-100">Pemesanan Sampah</h2>
                            </div>
                            <form action="/pemilik/postpesanan" method="POST">
                                @csrf

                                <div class="mb-3 row align-items-center">
                                    <label for="berat" class="col-sm-4 col-form-label">Berat Sampah (kg)</label>
                                    <div class="col-sm-8">
                                        <input type="number" name='kg_sampah' class="form-control" id="berat"
                                            placeholder="Contoh: 3">
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
                                        <select class="form-select" aria-label="Bank Sampah" name="id_location"
                                            id="id_location">
                                            <option selected disabled>Pilih Bank Sampah</option>
                                            <option value=1>TPA Kota Baru</option>
                                            <option value=2>TPA Sampah Karanganyar</option>
                                            <option value=3>TPA Amplaz</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Add this div for the map -->
                                <div id="bankSampahMap" style="height: 400px;"></div>

                                <div class="mb-3 row align-items-center">
                                    <label for="jenis" class="col-sm-4 col-form-label">Pilih Jam</label>
                                    <div class="col-sm-8">
                                        <!-- Improved radio buttons with spacing -->
                                        @foreach (['09.30', '11.30', '13.30', '15.30'] as $jam)
                                            <div class="form-check form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="jam"
                                                    id="inlineRadio{{ $loop->index + 2 }}" value="{{ $jam }}">
                                                <label class="form-check-label"
                                                    for="inlineRadio{{ $loop->index + 2 }}">{{ $jam }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input type="text" name='harga' class="form-control" id="harga" readonly>
                                        <div id="formattedHarga"></div>
                                    </div>
                                </div>

                                <input type="hidden" name="status" value="Process">
                                <input type="hidden" name="pengambilan" value="Belum diambil">

                                <div class="col-md-12 text-center mb-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        Bayar
                                        <!-- Add an icon if needed -->
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to initialize the map
            function initializeMap() {
                var selectedBankSampah = document.getElementById('id_location');
                var latitude1 = parseFloat(selectedBankSampah.options[selectedBankSampah.selectedIndex]
                    .getAttribute('data-latitude')) || 0;
                var longitude1 = parseFloat(selectedBankSampah.options[selectedBankSampah.selectedIndex]
                    .getAttribute('data-longitude')) || 0;

                var bankSampahMap = L.map('bankSampahMap').setView([latitude1, longitude1], 14);

                // Add a basemap (e.g., OpenStreetMap)
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(bankSampahMap);

                // Add markers for the selected Bank Sampah and two additional locations
                L.marker([-7.787534844496852, 110.3693522810411])
                    .addTo(bankSampahMap)
                    .bindPopup('TPA Kota Baru')
                    .openPopup();

                // Example coordinates for two additional locations
                var latitude2 = -7.8138741831102685;
                var longitude2 = 110.37186953460812;

                var latitude3 = -7.782460662075439;
                var longitude3 = 110.40113851084658;

                // Add markers for the two additional locations
                L.marker([latitude2, longitude2])
                    .addTo(bankSampahMap)
                    .bindPopup('TPA Sampah Karanganyar')
                    .openPopup();

                L.marker([latitude3, longitude3])
                    .addTo(bankSampahMap)
                    .bindPopup('TPA Amplaz')
                    .openPopup();
            }

            // Call the initializeMap function
            initializeMap();
        });
    </script>



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
