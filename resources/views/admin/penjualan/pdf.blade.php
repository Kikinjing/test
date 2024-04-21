<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Memuat Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <p><strong>Nama Pelanggan:</strong> {{ $pelanggan->nama_pelanggan }}</p>
    <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
    <p><strong>Nomor Telp:</strong> {{ $pelanggan->no_tlp }}</p>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10%" class="text-center">No</th> &nbsp;
                    <th style="width: 30%" class="text-center">Nama Produk</th>
                    <th style="width: 30%" class="text-center">Jumlah Produk</th>
                    <th style="width: 30%" class="text-center">SubTotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $penjualan->produks->nama_produk }}</td>
                    <td class="text-center">{{ $penjualan->jumlah_produk }}</td>
                    <td class="text-center">
                        Rp.{{ number_format($penjualan->subtotal, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>