@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penjualan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                            @if (Auth::user()->role == 'petugas')
                                <a href="{{ route('penjualan-create') }}">
                                    <button class="btn btn-sm btn-primary" style="float: right">Tambah</button>
                                </a>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">No</th>
                                        <th style="width: 10px" class="text-center">Nama Produk</th>
                                        <th style="width: 10px" class="text-center">Jumlah Produk</th>
                                        <th style="width: 30px" class="text-center">SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($penjualans as $penjualan)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $penjualan->produk->nama_produk }}</td>
                                            <td class="text-center">{{ $penjualan->jumlah_produk }}</td>
                                            <td class="text-center">
                                                Rp.{{ number_format($penjualan->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card -->
                        @if (Auth::user()->role == 'admin')
                            <div class="card-footer">
                                <a href="{{ route('penjualan-admin') }}" class="btn btn-sm btn-secondary"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        @else
                            <div class="card-footer">
                                <a href="{{ route('penjualan') }}" class="btn btn-sm btn-secondary"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        @endif
                    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
