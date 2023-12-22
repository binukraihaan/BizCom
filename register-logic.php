<?php
session_start();
include "inc/connect.php";

if (isset($_POST['register_btn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_email_query = "SELECT email, name FROM user_data WHERE email='$email' AND name='$name' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        echo '
        <script>
        alert("Email already exists");
        </script>
';
        // header("Location: login.php");
    } else {
        $query = "INSERT INTO user_data (name, email, password) VALUES ('$name', '$email', '$password')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['username'] = $name; 
            echo "Registration successful!";
            header("Location: dashboard.php"); 
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location: login.php");
        }
    }
}

?>

