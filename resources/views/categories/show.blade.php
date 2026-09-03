@extends('layouts.app')

@section('title', 'Detail - Category Page')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail - Category Page</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Detail Category</h5>
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

                </div>

                <div class="card-footer">

                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        <span class="fa fa-arrow-left"></span>
                        Back
                    </a>

                </div>

            </div>

        </div>
    </div>

@endsection