<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h3 {
            margin: 0;
            font-size: 16px;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        td {
            padding: 3px 0;
            vertical-align: top;
        }
        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>Toko Kelontong</h3>
        <small>Jl. Contoh No.1, Indonesia</small><br>
        <small>Tanggal: {{ $transaksi->created_at->format('d/m/Y H:i') }}</small>
    </div>

    <div class="line"></div>

    <table>
        <tr>
            <td width="40%">Produk</td>
            <td>: {{ $produk->nama_produk }}</td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>: {{ $transaksi->jumlah }}</td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td>: Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Total</strong></td>
            <td>: <strong>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="footer">
        <p>Terima kasih telah berbelanja 🙏</p>
        <p><strong>~ Toko Kelontong ~</strong></p>
    </div>
</body>
</html>
