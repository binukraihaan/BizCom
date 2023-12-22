<!-- <?php
        // // Include database connection logic
        // include('inc/connect.php');

        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     // Extract business data from the POST request
        //     $user_id = $_SESSION['user_id'];  

        //     $total_assets = $_POST["total_assets"];
        //     $cash_assets = $_POST["cash_assets"];
        //     // $liabilities = $_POST["liabilities"];
        //     // $equity = $_POST["equity"];
        //     // $net_profit = $_POST["net_profit"];
        //     // $gross_profit = $_POST["gross_profit"];
        //     // $sales_revenue = $_POST["sales_revenue"];
        //     // $debts = $_POST["debts"];

        //     $cash_ratio = ($cash_assets / $liabilities);
        //     $current_ratio = ($total_assets / $liabilities);
        //     $net_profit_margin = ($net_profit / $sales_revenue) * 100;
        //     $gross_profit_margin = ($gross_profit / $sales_revenue) * 100;
        //     $debt_ratio = ($total_debts / $total_assets);
        //     $equity_ratio = ($equity / $total_assets);


        //     // $query = "INSERT INTO business_data (user_id, total_assets, cash_assets) 
        //     //           VALUES ('$user_id', '$total_assets', '$cash_assets')";

        //     $sql = "INSERT INTO business_data (cash_assets, debts) VALUES (10000, 10000)";

        //     $result = mysqli_query($conn, $query);

        //     if ($result) {
        //         // Successfully saved data
        //         $response = array("status" => "success", "message" => "Business data saved successfully.");
        //         echo json_encode($response);
        //     } else {
        //         // Failed to save data
        //         $response = array("status" => "error", "message" => "Error saving business data.");
        //         echo json_encode($response);
        //     }

        //     // Close the database connection
        // }
        ?> -->

<?php

session_start();
include "inc/connect.php";

$user_id = $_SESSION['user_id'];

$total_assets = $_POST["total_assets"];
$cash_assets = $_POST["cash_assets"];
$liabilities = $_POST["liabilities"];
$equity = $_POST["equity"];
$net_profit = $_POST["net_profit"];
$gross_profit = $_POST["gross_profit"];
$sales_revenue = $_POST["sales_revenue"];
$debts = $_POST["debts"];

$current_date = date("Y/m/d");

$cash_ratio = ($cash_assets / $liabilities);
$current_ratio = ($total_assets / $liabilities);
$net_profit_margin = ($net_profit / $sales_revenue) * 100;
$gross_profit_margin = ($gross_profit / $sales_revenue) * 100;
$debt_ratio = ($debts / $total_assets);
$equity_ratio = ($equity / $total_assets);

// Insert data into the database
$sql = "INSERT INTO financial_data (user_id, total_assets, cash_assets, liabilities, equity, net_profit, gross_profit, sales_revenue, total_debts, cash_ratio, current_ratio, debt_ratio, equity_ratio, net_profit_margin, gross_profit_margin, calculated_date) 
VALUES ('$user_id', '$total_assets', '$cash_assets', '$liabilities', '$equity', '$net_profit', '$gross_profit', '$sales_revenue', '$debts', '$cash_ratio', '$current_ratio', '$debt_ratio', '$equity_ratio', '$net_profit_margin', '$gross_profit_margin', '$current_date')";

if ($conn->query($sql) === TRUE) {
    header("Location: results.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>