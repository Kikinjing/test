@extends('admin.layouts.app')

@section('content')
    <style>
        .button-container {
            position: relative;
            display: inline-block;
        }

        .tooltip {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .button-container:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }

        /* .button-container .btn {
                                                                                                                                                                                                                                        margin-bottom: 25px;
                                                                                                                                                                                                                                    } */
    </style>

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

    {{-- modal-detail-penjualan --}}
    {{-- <div class="modal fade" id="detailpenjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Customer Name:</strong> Jsj</p>
                    <p><strong>Address:</strong> Jjsj</p>
                    <p><strong>Contact Number:</strong> 649</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px" class="text-center">No</th>
                                <th style="width: 10px" class="text-center">Nama Produk</th>
                                <th style="width: 10px" class="text-center">Jumlah</th>
                                <th style="width: 30px" class="text-center">SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualans as $penjualan)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $penjualan->detai_id }}</td>
                                    <td class="text-center">{{ $penjualan->jumlah_produk }}</td>
                                    <td class="text-center">
                                        Rp.{{ number_format($penjualan->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                    </table>
                    <p><strong>Total:</strong> Rp. 162,000</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

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
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">No</th>
                                        <th style="width: 10px" class="text-center">Tanggal</th>
                                        <th style="width: 10px" class="text-center">Pelanggan</th>
                                        {{-- <th style="width: 10px" class="text-center">Produk</th> --}}
                                        <th style="width: 10px" class="text-center">Total</th>
                                        <th style="width: 30px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($penjualans as $penjualan)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">{{ $penjualan->tanggal_penjualan }}</td>
                                            <td class="text-center">{{ $penjualan->pelanggan->nama_pelanggan }}</td>
                                            <td class="text-center">
                                                Rp.{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                            <td class="d-flex justify-content-center">
                                                @if (Auth::user()->role == 'petugas')
                                                    <div class="button-container">
                                                            {{-- <a
                                                                href="{{ route('detail-penjualan-petugas', ['id' => $penjualan->penjualan_id]) }}"> --}}
                                                        {{-- <button type="button"
                                                            class="mr-1 btn btn-sm btn-primary btn-detail"
                                                            data-url="{{ route('detail-penjualan-petugas', ['id' => $penjualan->penjualan_id]) }}"
                                                            data-toggle="modal" data-target="#detailpenjualan"
                                                            > --}}
                                                            <button type="button" class="mr-1 btn btn-sm btn-primary btn-detail" data-bs-toggle="modal" data-bs-target="#showDetail-{{ $penjualan->penjualan_id }}">
                                                            <i class="bi bi-info-square"></i>
                                                        </button>
                                                        {{-- </a> --}}
                                                        <span class="tooltip">Detail</span>
                                                    </div>
                                                @else
                                                    <div class="button-container">
                                                        <a
                                                            href="{{ route('admin-detail-penjualan', ['id' => $penjualan->penjualan_id]) }}">
                                                            <button type="button"
                                                                class="mr-1 btn btn-sm btn-primary btn-detail">
                                                                <i class="bi bi-info-square"></i>
                                                            </button>
                                                        </a>
                                                        <span class="tooltip">Detail</span>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="showDetail-{{ $penjualan->penjualan_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Customer Name:</strong> Jsj</p>
                                                    <p><strong>Address:</strong> Jjsj</p>
                                                    <p><strong>Contact Number:</strong> 649</p>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px" class="text-center">No</th>
                                                                <th style="width: 10px" class="text-center">Nama Produk</th>
                                                                <th style="width: 10px" class="text-center">Jumlah</th>
                                                                <th style="width: 30px" class="text-center">SubTotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    @foreach ($details->where('penjualan_id', $penjualan->penjualan_id)->get() as $detail)
                                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                                        <td class="text-center">{{ $detail->produks->nama_produk }}</td>
                                                                        <td class="text-center">{{ $detail->jumlah_produk }}</td>
                                                                        <td class="text-center">
                                                                            Rp.{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                                                    @endforeach
                                                                </tr>
                                                    </table>
                                                    <p><strong>Total:</strong> Rp. {{ number_format($penjualan->total_harga, 0, ',', '.') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card -->
                    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('cotumJs')
    <script>
        $('.btn-detail').click(function() {
            var url = $(this).data('url');
            $('#detailpenjualan #penjualan_id').val('')
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(res) {
                    $('#detailpenjualan #penjualan_id').val(res['penjualan_id'])
                }
            });
        });
    </script>
@endsection
