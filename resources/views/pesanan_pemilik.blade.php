@extends('Layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <form action="/pemilik/postpesanan" method="POST">
                        @csrf
                        <h4 class="mb-3 fs-4 fw-bold">Input Ambil Sampah</h4>

                        <div class="mb-3 row">
                            <label for="berat" class="col-sm-2 col-form-label">Berat Sampah (kg)</label>
                            <div class="col-sm-10">
                                <input type="number" name='kg_sampah' class="form-control" id="berat" placeholder="Contoh: 3">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Pilih Jam</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jam" id="inlineRadio1" value="08.00">
                                    <label class="form-check-label" for="inlineRadio1">08.00</label>
                                </div>
                                <!-- Add similar form-check elements for other radio options -->
                            </div>
                        </div>

                        <input type="hidden" name="status" value="process">

                        <div class="col-md-12 px-4 text-end mb-4">
                            <button type="submit" class="btn btn-primary btn-lg px-4"><i class="bi bi-check"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </main>
@endsection
