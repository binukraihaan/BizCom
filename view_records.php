<?php

session_start();
include "inc/connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <?php include "inc/all_css.php"; ?>

</head>

<body>

    <?php include "inc/header.php"; ?>


    <div class="text-center mt-5">
        <h4 class="text-uppercase">Outcomes Realized</h4>
    </div>

    <div class="container">

        <table class="table table-bordered table-hover table-striped my-3">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cash Ratio</th>
                    <th scope="col">Current Ratio</th>
                    <th scope="col">Equity Ratio</th>
                    <th scope="col">Debt Ratio</th>
                    <th scope="col">Net Profit Margin</th>
                    <th scope="col">Gross Profit Margin</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $user_id = $_SESSION['user_id'];


                $sql = "SELECT * FROM financial_data WHERE user_id = '$user_id'";

                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $date = $row['calculated_date'];
                        $cash_ratio = $row['cash_ratio'];
                        $current_ratio = $row['current_ratio'];
                        $equity_ratio = $row['equity_ratio'];
                        $debt_ratio = $row['debt_ratio'];
                        $net_profit_margin = $row['net_profit_margin'];
                        $gross_profit_margin = $row['gross_profit_margin'];
                        echo '<tr>
                                        <th>' . $date . '</th>
                                        <td>' . $cash_ratio . '</td>
                                        <td>' . $current_ratio . '</td>
                                        <td>' . $equity_ratio . '</td>
                                        <td>' . $debt_ratio . '</td>
                                        <td>' . $gross_profit_margin . '</td>
                                        <td>' . $net_profit_margin . '</td>
                                        
                                    </tr>';
                    };
                }

                ?>
            </tbody>
        </table>

    </div>

    <script>

            function generate(orderId){
                window.location.href = 'invoice_data.php?orderId=' + orderId;
            }

    </script>

    <?php include "inc/all_scripts.php"; ?>



</body>

</html>