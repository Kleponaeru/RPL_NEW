<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include Chart.js from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <!-- Back button -->
    <button onclick="goBack()">Go Back</button>

    <!-- HTML canvas element where the chart will be rendered -->
    <canvas id="OrganikVsAnorganikChartSmall"></canvas>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #chart-container {
            text-align: center;
        }

        #OrganikVsAnorganikChartSmall {
            width: 600px;
            height: 600px;
        }
    </style>

    <!-- Your existing Chart.js script -->

    <script>
        // Initial data
        var organikData = {!! json_encode($orders->where('jns_smph', 'Organik')->pluck('kg_sampah')) !!};
        var anorganikData = {!! json_encode($orders->where('jns_smph', 'Anorganik')->pluck('kg_sampah')) !!};

        // Get the canvas element
        var ctx = document.getElementById('OrganikVsAnorganikChartSmall').getContext('2d');

        // Define custom colors for datasets
        var organikColor = 'rgba(75, 192, 192, 0.6)';
        var anorganikColor = 'rgba(255, 99, 132, 0.6)';

        // Create the initial pie chart
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Organik', 'Anorganik'],
                datasets: [{
                    label: 'Berat Sampah',
                    data: [organikData.reduce((a, b) => a + b, 0), anorganikData.reduce((a, b) => a + b,
                        0)],
                    backgroundColor: [organikColor, anorganikColor],
                    borderWidth: 0,
                    borderColor: 'rgba(0, 0, 0, 0)' // Set borderColor to fully transparent
                }]
            },
            options: {
                responsive: false, // Disable responsiveness
                maintainAspectRatio: false, // Disable aspect ratio
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Function to update the chart with new data
        function updateChartData() {
            // Simulated new data (replace this with your actual logic)
            var newOrganikData = [ /* your new organik data array */ ];
            var newAnorganikData = [ /* your new anorganik data array */ ];

            // Update the chart data
            myChart.data.datasets[0].data = [
                newOrganikData.reduce((a, b) => a + b, 0),
                newAnorganikData.reduce((a, b) => a + b, 0)
            ];

            // Update the chart
            myChart.update();
        }

        // // Simulated data update every 5 seconds (replace this with your actual logic)
        // setInterval(updateChartData, 5000);

        // Function to go back
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
