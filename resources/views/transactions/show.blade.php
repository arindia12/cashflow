@extends('layouts.app')

@section('title', 'Detail - Transaction Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail - Transaction Page</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Transaction</h5>
                </div>

                <div class="card-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Kategori</label>
                        <input
                            type="text"
                            value="{{ $transaction->category->name ?? '-' }}"
                            class="form-control"
                            readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Jenis Transaksi</label>
                        <input
                            type="text"
                            value="{{ $transaction->type }}"
                            class="form-control"
                            readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal</label>
                        <input
                            type="date"
                            value="{{ $transaction->date }}"
                            class="form-control"
                            readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Jumlah</label>
                        <input
                            type="text"
                            value="Rp {{ number_format($transaction->amount, 0, ',', '.') }}"
                            class="form-control"
                            readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea
                            class="form-control"
                            rows="3"
                            readonly>{{ $transaction->description ?? '-' }}</textarea>
                    </div>

                </div>

                <div class="card-footer">
                    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
                        <span class="fa fa-arrow-left"></span>
                        Back
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection