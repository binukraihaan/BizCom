<?php

session_start();
include "./inc/connect.php";

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include "./inc/all_css.php"; ?>

    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 70%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #3B4A6B;
        }
    </style>

</head>

<body>

    <?php include "./inc/header.php"; ?>

    <div class="container emp-profile">
        
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" alt="" />

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <?php

                        $sql = "SELECT * FROM user_data WHERE name = '$username'";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $business = $row['business'];
                                echo '<h5 class = "h4">' . $business . '</h5>';
                            }
                        }

                        ?>
                        <?php

                        $sql = "SELECT * FROM user_data WHERE name = '$username'";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $owner = $row['owner'];
                                echo '<h6> By ' . $owner . '</h>';
                            }
                        }

                        ?>
                        <p class="proile-rating"><?php

                                                    $sql = "SELECT * FROM user_data WHERE name = '$username'";
                                                    $result = mysqli_query($conn, $sql);

                                                    if ($result) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $bio = $row['bio'];
                                                            echo '<span>' . $bio . '</span>';
                                                        }
                                                    }

                                                    ?></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <!-- <a href="index.php"><button type="submit" class="profile-edit-btn" name="btnAddMore">Edit Profile</button></a> -->
                    <a href="profile_page.php" class="btn btn-dark">Edit Profile</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center" style="font-size: 25px;">

                        <!-- <a href=""><i class="fa-brands fa-facebook mx-2 text-dark"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin mx-2 text-dark"></i></a>
                        <a href=""><i class="fa-brands fa-instagram mx-2 text-dark"></i></a>
                        <a href=""><i class="fa-brands fa-square-x-twitter mx-2 text-dark"></i></a> -->

                        <?php

                                    $sql = "SELECT * FROM user_data WHERE name = '$username'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $facebook = $row['facebook'];
                                            $linkedin = $row['linkedin'];
                                            $instagram = $row['instagram'];
                                            $twitter = $row['twitter'];

                                            echo '<a href="'.$facebook.'" target="_blank"><i class="fa-brands fa-facebook mx-2 text-dark"></i></a>';
                                            echo '<a href="'.$linkedin.'"><i class="fa-brands fa-linkedin mx-2 text-dark"></i></a>';
                                            echo '<a href="'.$instagram.'"><i class="fa-brands fa-instagram mx-2 text-dark"></i></a>';
                                            echo '<a href="'.$twitter.'"><i class="fa-brands fa-square-x-twitter mx-2 text-dark"></i></a>';
                                        }
                                    }

                                    ?>

                    </div>

                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>UserName</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $_SESSION['username']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <?php

                                    $sql = "SELECT * FROM user_data WHERE name = '$username'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $email = $row['email'];
                                            echo '
                                            <p>' . $email . '</p>';
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <?php

                                    $sql = "SELECT * FROM user_data WHERE name = '$username'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $phone = $row['phone'];
                                            echo '<p>' . $phone . '</p>';
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Web</label>
                                </div>
                                <div class="col-md-6">
                                    <?php

                                    $sql = "SELECT * FROM user_data WHERE name = '$username'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $web = $row['web'];
                                            echo '<p>' . $web . '</p>';
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        
    </div>


    <?php include "./inc/all_scripts.php"; ?>
</body>

</html>