@extends('layouts.app')

@section('title', 'Profil')

@push('styles')
<style>
    #content-wrapper, body { background-color: #fce4ec !important; }

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

    /* Kartu Tips Keuangan */
    .cf-tips-card {
        height: 350px;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;

        padding: 2rem 1.5rem;

        background: #fb607f;
        border-radius: 16px;
    }

    .cf-tips-label {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.75);
        letter-spacing: 0.04em;

        margin-bottom: 1.25rem;
    }

    .cf-tips-icon {
        width: 64px;
        height: 64px;
 
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
 
        display: flex;
        align-items: center;
        justify-content: center;
 
        margin-bottom: 1.25rem;
    }

    .cf-tips-icon i {
        font-size: 1.6rem;
        color: #fff;
    }

    .cf-tips-text {
        font-size: 0.9rem;
        color: #fff;
        line-height: 1.6;
 
        min-height: 66px;
 
        display: flex;
        align-items: center;
    }

    .cf-tips-nav {
        display: flex;
        align-items: center;
        gap: 14px;
 
        margin-top: 1.25rem;
    }

    .cf-tips-nav button {
        border: none;
        background: none;
        color: rgba(255,255,255,0.75);
 
        font-size: 1rem;
        cursor: pointer;
        padding: 4px;
    }

    .cf-tips-nav button:hover {
        color: #fff;
    }

    .cf-tips-dots {
        display: flex;
        gap: 6px;
    }
 
    .cf-tips-dots span {
        width: 6px;
        height: 6px;
 
        border-radius: 50%;
        background: rgba(255,255,255,0.4);
        display: inline-block;
    }
 
    .cf-tips-dots span.active {
        background: #fff;
    }
</style>
@endpush

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>

        <a href="{{ route('admin.home') }}" class="btn btn-cf-outline btn-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @push('scripts')
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: @json(session('success')),
                    confirmButtonColor: '#ec4899',
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: @json($errors->first()),
                    confirmButtonColor: '#ec4899'
                });
            </script>
        @endif
    @endpush

    <div class="row align-items-stretch mb-5">
        <div class="col-md-6 mb-3 mb-md-0">

            <div class="card cf-card h-100">

                <form action="{{ route('admin.profile.update') }}" method="POST">
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

        <div class="col-md-6">

            <div class="card cf-card">

                <div class="cf-tips-card">

                    <div class="cf-tips-label">
                        TIPS KEUANGAN
                    </div>

                    <div class="cf-tips-icon" id="cfTipsIcon">
                        <i class="fas fa-piggy-bank"></i>
                    </div>

                    <div class="cf-tips-text" id="cfTipsText">
                       Sisihkan minimal 10% penghasilan untuk tabungan darurat.
                    </div>

                    <div class="cf-tips-nav">

                    <button type="button" id="cfTipsPrev" aria-label="Tips sebelumnya">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="cf-tips-dots" id="cfTipsDots"></div>

                    <button type="button" id="cfTipsNext" aria-label="Tips berikutnya">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    </div>

                </div>

            </div>

        </div>
    </div>

    @push('scripts')
       <script>
           (function () {
 
                var tips = [
                    { icon: 'fa-piggy-bank', text: 'Sisihkan minimal 10% penghasilan untuk tabungan darurat.' },
                    { icon: 'fa-book',       text: 'Catat setiap pengeluaran, sekecil apa pun, agar keuangan lebih terkontrol.' },
                    { icon: 'fa-tags',       text: 'Pisahkan kategori kebutuhan dan keinginan sebelum belanja.' },
                    { icon: 'fa-chart-line', text: 'Tinjau laporan keuangan bulanan secara rutin di dashboard.' },
                    { icon: 'fa-bullseye',   text: 'Tetapkan target tabungan bulanan dan pantau progresnya.' }
                ];

                var idx = 0;
                var iconEl = document.querySelector('#cfTipsIcon i');
                var textEl = document.getElementById('cfTipsText');
                var dotsEl = document.getElementById('cfTipsDots');
 
                tips.forEach(function (_, i) {
                    var d = document.createElement('span');
                    if (i === 0) d.classList.add('active');
                    dotsEl.appendChild(d);
                });

                function render() {
                    iconEl.className = 'fas ' + tips[idx].icon;
                    textEl.textContent = tips[idx].text;
 
                    Array.prototype.forEach.call(dotsEl.children, function (d, i) {
                        d.classList.toggle('active', i === idx);
                    });
                }
 
                document.getElementById('cfTipsPrev').addEventListener('click', function () {
                    idx = (idx - 1 + tips.length) % tips.length;
                    render();
                });

                document.getElementById('cfTipsNext').addEventListener('click', function () {
                    idx = (idx + 1) % tips.length;
                    render();
                });
 
                setInterval(function () {
                    idx = (idx + 1) % tips.length;
                    render();
                }, 8000);
 
            })();
        </script>
    @endpush

@endsection