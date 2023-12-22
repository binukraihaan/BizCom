<?php

include "inc/connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BizCom | Member</title>
    <link rel="stylesheet" href="css/login_style.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .container {
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #3b4a6b;
            column-gap: 30px;
        }
    </style>
</head>

<body>

    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>UPDATE PASSWORD</header>

                <?php

                if (isset($_POST['update_btn'])) {

                    $update_password = $_POST['updating_password'];
                    $repeat_password = $_POST['password_again'];
                    $update_email = $_POST['updating_email'];

                    $sql = "UPDATE user_data SET password = '$update_password' WHERE email = '$update_email'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {

                        echo '
                        <h6 style="text-align: center; font-style: italic; font-size: 15px; margin-top: 10px; color:green;">Password Updated Successfully</h6>
                ';
                    } else {
                        echo '
                        <h6 style="text-align: center; font-style: italic; font-size: 15px; margin-top: 10px; color:red;">Invalid Password</h6>
                ';
                    }
                }

                ?>

                <form action="forgetpassword.php" method="post">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="updating_email">
                    </div>

                    <div class="field input-field">
                        <input type="text" placeholder="Create new password" class="input" name="updating_password">
                    </div>

                    <div class="field input-field">
                        <input type="text" placeholder="Confirm your password" class="password" name="password_again">
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="update_btn">Update Password</button>
                    </div>

                    <div class="line"></div>
                    <div class="media-options">
                        <a href="index.html" class="form-link">
                            <span>
                                << Back To Home</span>
                        </a>
                    </div>

                </form>


            </div>

        </div>

    </section>

</body>

</html>