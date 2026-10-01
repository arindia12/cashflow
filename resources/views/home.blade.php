@extends('layouts.app')

@push('styles')
<style>
    #content-wrapper, body { background-color: #fce4ec !important; }

    .cf-stat-card { border: none; border-radius: 16px; box-shadow: 0 2px 14px rgba(0,0,0,0.06); }
    .cf-stat-icon {
        width: 46px; height: 46px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem;
        margin-right: 16px; 
        flex-shrink: 0;
    }
    .cf-icon-in    { background: #fdeef4; color: #ec4899; }
    .cf-icon-out   { background: #fdeef4; color: #ec4899; }
    .cf-icon-saldo { background: #fdeef4; color: #ec4899; }
    .cf-card { border: none; border-radius: 16px; box-shadow: 0 2px 14px rgba(0,0,0,0.06); }
    .cf-card .card-header { background: #fff; border-bottom: 1px solid #f5e3ec; border-radius: 16px 16px 0 0; font-weight: 600; }
    .cf-badge-in  { background: #e6f6ea; color: #1e9e4c; padding: 2px 8px; border-radius: 6px; font-size: .75rem; }
    .cf-badge-out { background: #fdeaea; color: #d64545; padding: 2px 8px; border-radius: 6px; font-size: .75rem; }
    a.small.cf-link { color: #ec4899; }
</style>
@endpush

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
            <div class="card cf-stat-card h-100">
                <div class="card-body d-flex align-items-center">

                    <div class="cf-stat-icon cf-icon-in">
                        <i class="fas fa-arrow-up"></i>
                    </div>

                    <div>
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-gray-600">
                            Total Pemasukan
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp {{ number_format($income, 0, ',', '.') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Total Pengeluaran -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card cf-stat-card h-100">
                <div class="card-body d-flex align-items-center">

                    <div class="cf-stat-icon cf-icon-out">
                        <i class="fas fa-arrow-down"></i>
                    </div>

                    <div>
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-gray-600">
                            Total Pengeluaran
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp {{ number_format($expense, 0, ',', '.') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Saldo -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card cf-stat-card h-100">
                <div class="card-body d-flex align-items-center">

                    <div class="cf-stat-icon cf-icon-saldo">
                        <i class="fas fa-wallet"></i>
                    </div>

                    <div>
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-gray-600">
                            Saldo Saat Ini
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rp {{ number_format($balance, 0, ',', '.') }}
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

            <div class="card cf-card shadow-sm">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color:#ec4899;">
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

            <div class="card cf-card shadow-sm">

                <div class="card-header py-3 d-flex justify-content-between align-items-center">

                    <h6 class="m-0 font-weight-bold" style="color:#ec4899;">
                        Transaksi Terbaru
                    </h6>

                    <a href="{{ route('admin.transactions.index') }}" class="small cf-link">
                        Lihat semua
                    </a>

                </div>

                <div class="card-body">

    @forelse ($latestTransactions as $transaction)

        <div class="mb-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <strong>
                        {{ $transaction->category->name ?? '-' }}
                    </strong>
                    <div>
                        <span class="{{ $transaction->type == 'income' ? 'cf-badge-in' : 'cf-badge-out' }}">
                            {{ $transaction->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                        </span>
                    </div>
                </div>

                <div class="text-right">

                    @if ($transaction->type == 'income')
                        <span class="text-success font-weight-bold">
                            + Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                        </span>
                    @else
                        <span class="text-danger font-weight-bold">
                            - Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                        </span>
                    @endif

                    <div class="small text-muted">
                        {{ \Carbon\Carbon::parse($transaction->date)->format('d-m-Y') }}
                    </div>

                </div>

            </div>

        </div>

        @if (!$loop->last)
            <hr>
        @endif

    @empty

        <p class="text-center text-muted mb-0">
            Belum ada transaksi.
        </p>

    @endforelse

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
                    labels: @json($months),
                    datasets: [
                        {
                            label: 'Pemasukan',
                            data: @json($incomeData),
                            backgroundColor: '#ec4899'
                        },
                        {
                            label: 'Pengeluaran',
                            data: @json($expenseData),
                            backgroundColor: '#fbc7dd'
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