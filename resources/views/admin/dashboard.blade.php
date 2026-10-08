@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Dashboard Admin Kasbon</h4>
                </div>
                <div class="card-body">
                    <p>Selamat datang di panel kontrol Admin Kasbon.</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-statistic-1 shadow-sm border">
                                <div class="card-icon bg-primary text-white p-3 text-center">
                                    <i class="fas fa-box fa-2x"></i>
                                </div>
                                <div class="card-wrap p-3">
                                    <div class="card-header p-0"><h4>Total Barang</h4></div>
                                    <div class="card-body p-0 font-weight-bold">120 Item</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-statistic-1 shadow-sm border">
                                <div class="card-icon bg-danger text-white p-3 text-center">
                                    <i class="fas fa-file-invoice-dollar fa-2x"></i>
                                </div>
                                <div class="card-wrap p-3">
                                    <div class="card-header p-0"><h4>Total Utang</h4></div>
                                    <div class="card-body p-0 font-weight-bold">Rp 1.500.000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection