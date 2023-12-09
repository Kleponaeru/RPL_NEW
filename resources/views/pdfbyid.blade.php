<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        h1{
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #invoice {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div id="invoice">
    <h1>LUNA - INVOICE</h1>
    <p>Jl. Dr. Wahidin Sudirohusodo No.5-25, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224</p>
    <hr><br>
    <p>
        <strong>Invoice Date:</strong> {{ now()->format('F j, Y') }}<br>
    </p>

    <table>
        <thead>
        <tr>
            {{-- <th>Item</th> --}}
            <th>Bank Sampah</th>
            <th>Berat Sampah</th>
            <th>Jenis</th>
            <th>Jam Pengambilan</th>
            <th>Harga</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            {{-- <td>1</td> --}}
            <td>{{ optional($data->location)->nama_location }}</td>
            <td>{{$data->kg_sampah}} Kg</td>
            <td>{{$data->jns_smph}}</td>
            <td>{{$data->jam}}</td>
            <td>{{$data->harga}}</td>
        </tr>
        </tbody>
    </table>

    <p class="total">
        <strong>Total: Rp.</strong> {{ $data->harga }}
    </p>
</div>

</body>
</html>
