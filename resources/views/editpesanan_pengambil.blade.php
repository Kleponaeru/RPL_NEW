@extends('Layouts.main')

@section('content')
    <main class="mt-5 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="/pengambil/update/{{ $n->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4 class="mb-3 fs-4 fw-bold text-center">Buat Pesanan Sampah</h4>
                                <div class="mb-3 row">
                                    <label for="berat" class="col-sm-4 col-form-label">Berat Sampah (kg)</label>
                                    <div class="col-sm-8">
                                        <input type="number" name='kg_sampah' class="form-control" id="berat" value="{{ $n->kg_sampah }}">
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label for="jns_smph" class="col-sm-4 col-form-label">Jenis Sampah</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Jenis Sampah" name="jns_smph">
                                            <option selected disabled>Pilih Jenis Sampah</option>
                                            <option value="Organik">Sampah Basah (Organik)</option>
                                            <option value="Anorganik">Sampah Padat (Anorganik)</option>
                                            <option value="Berbahaya">Sampah Berbahaya (Berbahaya)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jenis" class="col-sm-4 col-form-label">Pilih Jam</label>
                                    <div class="col-sm-8">
                                        <!-- Improved radio buttons with spacing -->
                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam"
                                                id="inlineRadio1" value="08.00" {{ ($n->jam == '08.00') ? 'checked':''}}>
                                            <label class="form-check-label" for="inlineRadio1">08.00</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam"
                                                id="inlineRadio2" value="09.30" {{ ($n->jam == '09.30') ? 'checked':''}}>
                                            <label class="form-check-label" for="inlineRadio2">09.30</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam"
                                                id="inlineRadio3" value="11.30" {{ ($n->jam == '11.30') ? 'checked':''}}>
                                            <label class="form-check-label" for="inlineRadio3">11.30</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam"
                                                id="inlineRadio4" value="13.30" {{ ($n->jam == '13.30') ? 'checked':''}}>
                                            <label class="form-check-label" for="inlineRadio4">13.30</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-2">
                                            <input class="form-check-input" type="radio" name="jam"
                                                id="inlineRadio5" value="15.30" {{ ($n->jam == '15.30') ? 'checked':''}}>
                                            <label class="form-check-label" for="inlineRadio5">15.30</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 px-4 text-center mb-4">
                                    <button type="submit" class="btn btn-primary px-4" name="status" value="Process">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
