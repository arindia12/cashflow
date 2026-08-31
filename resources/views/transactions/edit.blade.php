@extends('layouts.app')

@section('title', 'Edit - Transactions Page')

@section('content')

    <div class="d-sm-flex align-items-center justify-button-mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit - Transactions Page</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">

                <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h5 class="card-title">Edit Transactions</h5>
                    </div>

                    <div class="card-body">

                        <!-- Tanggal -->
                        <div class="form-group mb-3">
                            <label for="date" class="form-label">Tanggal</label>

                            <input
                                type="date"
                                name="date"
                                id="date"
                                value="{{ old('date', $transaction->date) }}"
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
                                        {{ old('category_id', $transaction->category_id) == $category->id ? 'selected' : '' }}>
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

                                <option
                                    value="income"
                                    {{ old('type', $transaction->type) == 'income' ? 'selected' : '' }}>
                                    Pemasukan
                                </option>

                                <option
                                    value="expense"
                                    {{ old('type', $transaction->type) == 'expense' ? 'selected' : '' }}>
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
                                value="{{ old('amount', $transaction->amount) }}"
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
                                rows="3">{{ old('description', $transaction->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-save"></span>
                            Save
                        </button>

                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
                            <span class="fa fa-times-circle"></span>
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection