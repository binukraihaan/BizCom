<?php

session_start();
include "inc/connect.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BizCom | Member</title>


    <link rel="stylesheet" href="css/login_style.css" />

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        <!-- Login Form -->

        <div class="form login">
            <div class="form-content">
                <header>LOGIN</header>

                <?php

                if (isset($_POST['login_btn'])) {
                    $username = $_POST['mail_or_name'];
                    $password = $_POST['user_password'];

                    $sql = "SELECT * FROM user_data WHERE name = '$username' AND password = '$password'";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);


                        $_SESSION["username"] = $username;
                        $_SESSION['user_id'] = $row['id'];

                        header("Location: dashboard.php");
                    } else {
                        echo '
                        <h6 style="text-align: center; font-style: italic; font-size: 15px; margin-top: 10px; color:red;">Invalid User Name or Password</h6>
           ';
                    }
                }



                ?>


                <form action="login.php" method="post">
                    <div class="field input-field">
                        <input type="text" placeholder="UserName" class="input" name="mail_or_name" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="user_password" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="forgetpassword.php" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="login_btn">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                </div>

                <div class="line"></div>
                <div class="media-options">
                    <a href="index.html" class="form-link">
                        <span>
                            << Back To Home</span>
                    </a>
                </div>

            </div>


        </div>

        <!-- Signup Form -->

        <div class="form signup">
            <div class="form-content">
                <header>REGISTER</header>

                <?php

                if (isset($_POST['register_btn'])) {

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];


                    $check_email_query = "SELECT email, name FROM user_data WHERE email='$email' AND name='$name' LIMIT 1";
                    $check_email_query_run = mysqli_query($conn, $check_email_query);

                    if (mysqli_num_rows($check_email_query_run) > 0) {
                        echo '
                        <script>
                        Swal.fire({
                            title: "Oops..",
                            text: "Email is already exists",
                            icon: "error"
                          });
                        </script>';
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

                <form action="login.php" method="post">

                    <div class="field input-field">
                        <input type="text" placeholder="UserName" class="input" name="name" required>
                    </div>

                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email" required>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password" required>
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field input-field">
                        <div class="g-recaptcha" data-sitekey="6LeNgCUpAAAAAL-OJQVmUkHcoXyY1JkwcYPzi8rA"></div>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="register_btn" id="register_btn" style="margin-top: 20px;">Signup</button>
                    </div>
                </form>

                <div class="form-link" style="margin-top: 30px;">
                    <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                </div>

                <div class="line"></div>
                <div class="media-options">
                    <a href="index.html" class="form-link">
                        <span>
                            << Back To Home</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- JavaScript -->
    <script src="js/login_script.js"></script>

    <script>
        $(document).on('click', '#register_btn', function() {

            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                alert("Please Verify You are not a robot..")
            }

        });
    </script>

</body>

</html>