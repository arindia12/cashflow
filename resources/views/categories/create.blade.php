@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card cf-card">

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="card-header">
                        <h5 class="card-title mb-0">Tambah Kategori Baru</h5>
                    </div>

                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Contoh: Makanan">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Jenis -->
                        <div class="form-group mb-3">
                            <label for="type" class="form-label">Jenis</label>

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
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-cf-pink">
                            <span class="fa fa-save"></span>
                            Simpan
                        </button>

                        <a href="{{ route('categories.index') }}" class="btn btn-cf-outline">
                            <span class="fa fa-times-circle"></span>
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection