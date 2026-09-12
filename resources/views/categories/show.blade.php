@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Kategori</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card cf-card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Kategori</h5>
                </div>

                <div class="card-body">

                    <div class="form-group mb-3">
                        <label class="form-label">Nama Kategori</label>

                        <input
                            type="text"
                            value="{{ $category->name }}"
                            class="form-control"
                            readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Jenis</label>
                        <div>
                            <span class="{{ $category->type == 'income' ? 'cf-badge-in' : 'cf-badge-out' }}">
                                {{ $category->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                            </span>
                        </div>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="{{ route('admin.categories.index') }}" class="btn btn-cf-outline">
                        <span class="fa fa-arrow-left"></span>
                        Kembali
                    </a>

                </div>

            </div>

        </div>
    </div>

@endsection