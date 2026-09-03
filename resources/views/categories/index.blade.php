@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    </div>

    <div class="card">

        <div class="card-header d-flex align-items-center justify-content-between">

            <h5 class="card-title mb-0">
                Data Kategori
            </h5>

            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <span class="fa fa-plus-circle mr-2"></span>
                <span>Tambah Kategori</span>
            </a>

        </div>

        <div class="card-body">

            <table class="table table-striped table-hover datatable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($categories as $category)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $category->name }}</td>

                            <td>

                                <a href="{{ route('categories.show', encrypt($category->id)) }}"
                                   class="btn btn-link text-secondary p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>

                                <a href="{{ route('categories.edit', encrypt($category->id)) }}"
                                   class="btn btn-link p-0 mx-2">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <a href="#"
                                   onclick="handleDestroy('{{ route('categories.destroy', encrypt($category->id)) }}')"
                                   class="btn btn-link text-danger p-0 mx-2">
                                    <span class="fa fa-trash"></span>
                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

            <form id="form-destroy" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>

        </div>

    </div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" />
@endpush

@push('scripts')

<script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript">

    $('.datatable').dataTable();

    function handleDestroy(url) {

        Swal.fire({
            title: "Apakah kamu ingin menghapus?",
            text: "Kamu tidak bisa mengembalikan data yang sudah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {

            if (result.isConfirmed) {
                $('#form-destroy').attr('action', url);
                $('#form-destroy').submit();
            }

        });

    }

</script>

@if (Session::has('success'))

    <script type="text/javascript">

        Swal.fire({
            title: "Berhasil!!",
            text: "{{ Session::get('success') }}",
            icon: "success",
            draggable: true
        });

    </script>

@endif

@endpush