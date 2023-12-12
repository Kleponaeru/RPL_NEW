<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LUNA | Luaran Pemilik Sampah</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('style_dash.css') }}">
</head>
<body>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here (e.g., title, stylesheets) -->
</head>
<body class="bg-gray-100">

<div class="container mx-auto my-8">
    <a href="/pemilik/dashboard" onclick="goBack()" class="btn btn-primary mb-4 inline-block">Go Back</a>

    <div class="p-6 bg-white rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Transaksi Bulanan</h2>
        <div class="chart-container">
            {!! $chart->container() !!}
        </div>
    </div>
</div>

<!-- Include the necessary scripts for the chart -->
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

</body>
</html>

</html>
