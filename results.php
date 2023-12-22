<?php

include "inc/connect.php";
session_start();

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <?php include "inc/all_css.php"; ?>

    <style>
        .more-details {
            background-color: #3b4a6b !important;
            border: 1px #3b4a6b;
            color: white;
            transition: all 0.3s;
        }

        .more-details:hover {
            color: #ffffff;
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
        }
    </style>


</head>

<body>

    <?php include "inc/header.php"; ?>

    <div class="container-fluid">


        <section id="stats-subtitle">
            <div class="row">
                <div class="col-12 mt-3 mb-1 text-center">
                    <h4 class="text-uppercase">Your Result</h4>
                    <p>Your current business health</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <!-- <i class="icon-chart primary font-large-2 mr-2"></i> -->
                                        <i class="bi bi-cash-coin text-warning font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Current Ratio</h4>

                                        <?php

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $date = $row['calculated_date'];

                                            echo "<span>As at " . $date . "</span>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>


                                        <!-- <span>As at 21/12/2023</span> -->
                                    </div>
                                    <div class="align-self-center">

                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $current_ratio  = $row['current_ratio'];

                                            echo "<h1>" . $current_ratio . "</h1>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="bi bi-coin font-large-2 mr-2" style="color: #3b4a6b;"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Cash Ratio</h4>
                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $date = $row['calculated_date'];

                                            echo "<span>As at " . $date . "</span>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>
                                    </div>

                                    <div class="align-self-center">

                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $cash_ratio  = $row['cash_ratio'];

                                            echo "<h1>" . $cash_ratio . "</h1>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="bi bi-bank text-warning font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Debt Ratio</h4>
                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $date = $row['calculated_date'];

                                            echo "<span>As at " . $date . "</span>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>
                                    </div>
                                    <div class="align-self-center">

                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $debt_ratio  = $row['debt_ratio'];

                                            echo "<h1>" . $debt_ratio . "</h1>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="bi bi-graph-up-arrow font-large-2 mr-2" style="color: #3b4a6b"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Equity Ratio</h4>
                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $date = $row['calculated_date'];

                                            echo "<span>As at " . $date . "</span>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>
                                    </div>
                                    <div class="align-self-center">

                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $equity_ratio  = $row['equity_ratio'];

                                            echo "<h1>" . $equity_ratio . "</h1>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="bi bi-currency-exchange text-warning font-large-2 mr-2"></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Gross Profit Margin</h4>
                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $date = $row['calculated_date'];

                                            echo "<span>As at " . $date . "</span>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>
                                    </div>
                                    <div class="align-self-center">

                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $gross_profit_margin  = $row['gross_profit_margin'];

                                            echo "<h1>" . $gross_profit_margin . "%</h1>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <i class="bi bi-speedometer2 font-large-2 mr-2" top-50 start-50></i>
                                    </div>
                                    <div class="media-body">
                                        <h4>Net Profit Margin</h4>
                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $date = $row['calculated_date'];

                                            echo "<span>As at " . $date . "</span>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>
                                    </div>
                                    <div class="align-self-center">

                                        <?php

                                        $query = "SELECT * FROM financial_data WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($conn, $query);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);

                                            $net_profit_margin  = $row['net_profit_margin'];

                                            echo "<h1>" . $net_profit_margin . "%</h1>";
                                        } else {

                                            echo "No business data available.";
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>

        <div>

            <form method="post" action="generate_invoice.php">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="cash_ratio" value="<?php echo $cash_ratio; ?>">
                <input type="hidden" name="current_ratio" value="<?php echo $current_ratio; ?>">
                <input type="hidden" name="debt_ratio" value="<?php echo $debt_ratio; ?>">
                <input type="hidden" name="equity_ratio" value="<?php echo $equity_ratio; ?>">
                <input type="hidden" name="net_profit_margin" value="<?php echo $net_profit_margin; ?>">
                <input type="hidden" name="gross_profit_margin" value="<?php echo $gross_profit_margin; ?>">
                <input type="submit" value="More Details" class="btn btn-primary more-details">
            </form>


            <!-- <button class="btn btn-primary more-details">More Details</button> -->
        </div>

    </div>

    <script>

    </script>

    <?php include "inc/all_scripts.php"; ?>
</body>

</html>