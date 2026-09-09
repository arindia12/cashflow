@extends('layouts.app')

@section('title', 'Profil')

@push('styles')
<style>
    #content-wrapper, body { background-color: #fdf4f8 !important; }

    .btn-cf-outline { border: 1px solid #ec4899; color: #ec4899; background: #fff; }
    .btn-cf-outline:hover { background: #fdeef4; color: #c2185b; }

    .cf-avatar {
        width: 90px; height: 90px; border-radius: 50%;
        background: #fdeef4; display: flex; align-items: center; justify-content: center;
        font-size: 2.2rem; color: #ec4899; margin: 0 auto 16px;
    }
    .cf-card { border: none; border-radius: 16px; box-shadow: 0 2px 14px rgba(0,0,0,0.06); }
    .cf-card .card-header { background: #fff; border-bottom: 1px solid #f5e3ec; border-radius: 16px 16px 0 0; font-weight: 600; }
    .btn-cf-pink { background-color: #ec4899; border-color: #ec4899; color: #fff; }
    .btn-cf-pink:hover { background-color: #c2185b; border-color: #c2185b; color: #fff; }
    .form-control:focus { border-color: #ec4899; box-shadow: 0 0 0 0.2rem rgba(236,72,153,.15); }
</style>
@endpush

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>

        <a href="{{ route('home') }}" class="btn btn-cf-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-6">

            <div class="card cf-card">

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Profil</h5>
                    </div>

                    <div class="card-body">

                        <div class="cf-avatar">
                            <i class="fas fa-user"></i>
                        </div>

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

                        <!-- Password Baru -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password Baru</label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="Masukkan password baru (opsional)"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                placeholder="Konfirmasi password baru"
                                class="form-control">
                        </div>

                    </div>

                    <div class="card-footer bg-white">

                        <button type="submit" class="btn btn-cf-pink">
                            <span class="fa fa-save"></span>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

@endsection