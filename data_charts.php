<?php
session_start();
include "inc/connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>

    <?php include "inc/all_css.php"; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</head>

<body>

    <?php include "inc/header.php";?>

<div class="container">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    // Fetch data from the PHP file
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            // Process the data and create the Chart.js chart
            const dates = data.map(entry => entry.calculated_date);
            const cashRatios = data.map(entry => entry.cash_ratio);
            const debtRatios = data.map(entry => entry.debt_ratio);
			const cRatios = data.map(entry => entry.current_ratio);
			const equity_ratio = data.map(entry => entry.equity_ratio);
			const net_profit_margin = data.map(entry => entry.net_profit_margin);
			const gross_profit_margin = data.map(entry => entry.gross_profit_margin);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [
                        {
                            label: 'Cash Ratio',
                            data: cashRatios,
                            borderWidth: 1
                        },
                        {
                            label: 'Debt Ratio',
                            data: debtRatios,
                            borderWidth: 1
                        },
						{
                            label: 'Current Ratio',
                            data: cRatios,
                            borderWidth: 1
                        },
                        {
                            label: 'Equity Ratio',
                            data: equity_ratio,
                            borderWidth: 1
                        },
                        {
                            label: 'Net Profit Margin',
                            data: net_profit_margin,
                            borderWidth: 1
                        },
                        {
                            label: 'Gross Profit Margin',
                            data: gross_profit_margin,
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>



</body>

</html>