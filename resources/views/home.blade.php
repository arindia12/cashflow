@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Dashboard</h1>
            <p class="mb-0 text-gray-600">
                Selamat datang, {{ Auth::user()->name }}! 👋
            </p>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row">

        <!-- Total Pemasukan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Pemasukan
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp 0
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <!-- Total Pengeluaran -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Pengeluaran
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp 0
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <!-- Saldo -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Saldo Saat Ini
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Rp 0
                            </div>

                        </div>

                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-gray-300"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Content Row -->
    <div class="row">

        <!-- Grafik -->
        <div class="col-xl-8 col-lg-7 mb-4">

            <div class="card shadow">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Ringkasan 6 Bulan Terakhir
                    </h6>
                </div>

                <div class="card-body">

                    <div class="chart-area">
                        <canvas id="cashflowChart"></canvas>
                    </div>

                </div>

            </div>

        </div>


        <!-- Transaksi Terbaru -->
        <div class="col-xl-4 col-lg-5 mb-4">

            <div class="card shadow">

                <div class="card-header py-3 d-flex justify-content-between align-items-center">

                    <h6 class="m-0 font-weight-bold text-primary">
                        Transaksi Terbaru
                    </h6>

                    <a href="{{ route('transactions.index') }}" class="small">
                        Lihat semua
                    </a>

                </div>

                <div class="card-body">

                    <p class="text-center text-muted mb-0">
                        Belum ada transaksi.
                    </p>

                </div>

            </div>

        </div>

    </div>


    @push('scripts')

        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

        <script>
            const ctx = document.getElementById('cashflowChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: [0, 0, 0, 0, 0, 0]
                        },
                        {
                            label: 'Pengeluaran',
                            data: [0, 0, 0, 0, 0, 0]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    @endpush

@endsection