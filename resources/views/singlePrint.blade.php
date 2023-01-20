<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>transaksi</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
            margin-top: 17px
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: royalblue;
            color: white;
        }
        h4, p{
            margin:0px;
        }
        caption{
            color: blue;
            font-weight: bold;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <caption>
                RENTAL MOBIL BANDUNG
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Transaksi <strong>#{{ $transaksi->id }}</strong></th>
                    <th>{{ $transaksi->created_at->format('D, d M Y') }}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Perusahaan: </h4>
                        <p>CarRent.<br>
                            Jl. Situ Tarate<br>
                            085343966997<br>
                            support@carrent.id
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Pelanggan: </h4>
                        <p>{{ $transaksi->user->detailUser->nama }}<br>
                          {{ $transaksi->user->detailUser->alamat }}<br>
                          {{ $transaksi->user->detailUser->no_telp }} <br>
                          {{ $transaksi->user->detailUser->email }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Mobil</th>
                    <th>No Polisi</th>
                    <th>Tambahan Supir</th>
                    <th>Warna</th>
                </tr>
                <tr>
                    <td>{{ $transaksi->mobil->nama_mobil }}</td>
                    <td>{{ ($transaksi->mobil->no_polisi) }}</td>
                    <td>{{ $transaksi->supir }}</td>
                    <td>{{ $transaksi->mobil->warna }}</td>
                </tr>
                <tr>
                    <th>Tanggal Rental</th>
                    <th>Tanggal Kembali</th>
                    <th>Lama Sewa</th>
                    <th>Harga</th>
                </tr>
                <tr>
                    <td>{{ $transaksi->tgl_sewa }}</td>
                    <td>{{ $transaksi->tgl_kembali }}</td>
                    <td>{{ $transaksi->lama_sewa }} Hari</td>
                    <td>Rp. {{ number_format($transaksi->mobil->harga) }}</td>
                </tr>
                <tr>
                    <th colspan="3">Total</th>
                    <td>Rp. {{ number_format($transaksi->total_bayar) }}</td>
                </tr>
            </tbody>
        </table>
        *Biaya Tambahan Jika Dengan Supir Rp. 80.000/hari
    </div>
</body>
</html>
