<?php

session_start();
include "inc/connect.php";

$owner = $_POST['owner'];
$business = $_POST['business'];
$bio = $_POST['bio'];
$type = $_POST['type'];
$phone = $_POST['phone'];
$web = $_POST['web'];
$address_one = $_POST['address_one'];
$address_two = $_POST['address_two'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$facebook = $_POST['facebook'];
$linkedin = $_POST['linkedin'];
$instagram = $_POST['instagram'];
$twitter = $_POST['twitter'];

$username = $_SESSION['username'];

$sql = "UPDATE user_data SET owner='$owner', business='$business', bio='$bio', type='$type', phone='$phone', web='$web', address_one='$address_one', address_two='$address_two', city='$city', zip_code='$zip_code', facebook='$facebook', linkedin='$linkedin',instagram='$instagram',twitter='$twitter' WHERE name='$username' LIMIT 1";
$query_run = mysqli_query($conn, $sql);

if ($query_run) {
   echo ""; 
} else {
    die(mysqli_error($conn));
}


?>