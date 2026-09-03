@extends('layouts.app')

@section('title', 'Profil')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Profil</h5>
                    </div>

                    <div class="card-body">

                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama</label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-save"></span>
                            Update
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection