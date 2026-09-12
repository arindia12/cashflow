@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card cf-card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Transaksi</h5>
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
                        <div>
                            <span class="{{ $transaction->type == 'income' ? 'cf-badge-in' : 'cf-badge-out' }}">
                                {{ $transaction->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                            </span>
                        </div>
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
                    <a href="{{ route('admin.transactions.index') }}" class="btn btn-cf-outline">
                        <span class="fa fa-arrow-left"></span>
                        Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection