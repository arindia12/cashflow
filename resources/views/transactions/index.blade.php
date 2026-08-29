@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>

        <a href="#" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Transaksi
        </a>
    </div>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Transaksi
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Metode Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($transactions as $transaction)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $transaction->date }}
                            </td>

                            <td>
                                {{ $transaction->type }}
                            </td>

                            <td>
                                Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $transaction->payment_method }}
                            </td>

                            <td>
                                {{ $transaction->description }}
                            </td>

                            <td>

                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="#" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="7" class="text-center">
                                Belum ada data transaksi.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection