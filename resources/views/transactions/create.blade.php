@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card cf-card">

                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf

                    <div class="card-header">
                        <h5 class="card-title">Tambah Transaksi Baru</h5>
                    </div>

                    <div class="card-body">

                        <!-- Tanggal -->
                        <div class="form-group mb-3">
                            <label for="date" class="form-label">Tanggal</label>

                            <input
                                type="date"
                                name="date"
                                id="date"
                                value="{{ old('date') }}"
                                class="form-control @error('date') is-invalid @enderror">

                            @error('date')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">Kategori</label>

                            <select
                                name="category_id"
                                id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">

                                <option value="">-- Pilih Kategori --</option>

                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Jenis -->
                        <div class="form-group mb-3">
                            <label for="type" class="form-label">Jenis Transaksi</label>

                            <select
                                name="type"
                                id="type"
                                class="form-control @error('type') is-invalid @enderror">

                                <option value="">-- Pilih Jenis --</option>
                                <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>
                                    Pemasukan
                                </option>
                                <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>
                                    Pengeluaran
                                </option>

                            </select>

                            @error('type')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Jumlah -->
                        <div class="form-group mb-3">
                            <label for="amount" class="form-label">Jumlah</label>

                            <input
                                type="text"
                                name="amount"
                                id="amount"
                                value="{{ old('amount') }}"
                                class="form-control @error('amount') is-invalid @enderror">

                            @error('amount')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Keterangan</label>

                            <textarea
                                name="description"
                                id="description"
                                class="form-control @error('description') is-invalid @enderror"
                                rows="3">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-cf-pink">
                            <span class="fa fa-save"></span>
                            Simpan
                        </button>

                        <a href="{{ route('transactions.index') }}" class="btn btn-cf-outline">
                            <span class="fa fa-times-circle"></span>
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection