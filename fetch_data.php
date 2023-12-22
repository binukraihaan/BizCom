<?php

session_start();

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'bizcom';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['user_id'];

// Query to get data from the database
$sql = "SELECT calculated_date, cash_ratio, debt_ratio, current_ratio, equity_ratio, net_profit_margin, gross_profit_margin FROM financial_data WHERE user_id = '$id'";
$result = $conn->query($sql);

// Fetch data from the result set
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>