<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/dashboard_inputs.css">
    <!-- <link rel="stylesheet" href="css/profile.css"> -->

    <?php include "inc/all_css.php"; ?>

    <style>
        :root {
            --primary-color: rgb(59, 74, 107);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .containers {
            text-align: center;
        }

        #splashScreen {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        body {
            /* font-family: Montserrat, "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; */
            /* margin: 0; */
            /* display: grid; */
            place-items: center;
            min-height: 100vh;
        }

        /* Global Stylings */
        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input {
            display: block;
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        .width-50 {
            width: 50%;
        }

        .ml-auto {
            margin-left: auto;
        }

        .text-center {
            text-align: center;
        }

        /* Progressbar */
        .progressbar {
            position: relative;
            display: flex;
            justify-content: space-between;
            counter-reset: step;
            margin: 2rem 0 4rem;
        }

        .progressbar::before,
        .progress {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            background-color: #dcdcdc;
            z-index: -1;
        }

        .progress {
            background-color: var(--primary-color);
            width: 0%;
            transition: 0.3s;
        }

        .progress-step {
            width: 2.1875rem;
            height: 2.1875rem;
            background-color: #dcdcdc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .progress-step::before {
            counter-increment: step;
            content: counter(step);
        }

        .progress-step::after {
            content: attr(data-title);
            position: absolute;
            top: calc(100% + 0.5rem);
            font-size: 0.85rem;
            color: #666;
        }

        .progress-step-active {
            background-color: var(--primary-color);
            color: #f3f3f3;
        }

        /* Form */
        .form {
            width: clamp(320px, 30%, 430px);
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 0.35rem;
            padding: 1.5rem;
        }

        .form-step {
            display: none;
            transform-origin: top;
            animation: animate 0.5s;
        }

        .form-step-active {
            display: block;
        }

        .input-group {
            margin: 2rem 0;
        }

        @keyframes animate {
            from {
                transform: scale(1, 0);
                opacity: 0;
            }

            to {
                transform: scale(1, 1);
                opacity: 1;
            }
        }

        /* Button */
        .btns-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .btn {
            padding: 0.75rem;
            display: block;
            text-decoration: none;
            background-color: var(--primary-color);
            color: #f3f3f3;
            text-align: center;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
            color: #f3f3f3;
        }
    </style>
</head>

<body>

    <div class="splash-screen" id="splashScreen">
        <div class="loader"></div>
        <p class="my-2">Loading...</p>
    </div>

    <?php include "inc/header.php"; ?>




    <form action="save_business_data.php" method="post" class="form my-3">
        <p class="text-center h4">Financial Performance Evaluation</p>
        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>

            <div class="progress-step progress-step-active"></div>
            <div class="progress-step"></div>
            <div class="progress-step"></div>
            <div class="progress-step"></div>
        </div>

        <!-- Steps -->
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="total_assets">Total Assets</label>
                <input type="text" name="total_assets" id="total_assets" onclick="instructions()"  />
            </div>
            <div class="input-group">
                <label for="cash_assets">Cash Assets</label>
                <input type="text" name="cash_assets" id="cash_assets"  />
            </div>
            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="liabilities">Total Liabilities</label>
                <input type="text" name="liabilities" id="liabilities"  />
            </div>
            <div class="input-group">
                <label for="equity">Equity</label>
                <input type="text" name="equity" id="equity"  />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="debts">Total Debts</label>
                <input type="text" name="debts" id="debts" />
            </div>
            <div class="input-group">
                <label for="sales_revenue">Sales Revenue</label>
                <input type="text" name="sales_revenue" id="sales_revenue"  />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="gross_profit">Gross Profit</label>
                <input type="text" name="gross_profit" id="gross_profit"  />
            </div>
            <div class="input-group">
                <label for="net_profit">Net Profit</label>
                <input type="text" name="net_profit" id="net_profit"  />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <button type="submit" style="padding: 0.75rem;
    display: block;
    text-decoration: none;
    background-color: var(--primary-color);
    color: #f3f3f3;
    text-align: center;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: 0.3s;">Check</button>
            </div>
        </div>
    </form>

    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".progress-step");

        let formStepsNum = 0;

        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            });
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
                updateProgressbar();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("form-step-active") &&
                    formStep.classList.remove("form-step-active");
            });

            formSteps[formStepsNum].classList.add("form-step-active");
        }

        function updateProgressbar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("progress-step-active");
                } else {
                    progressStep.classList.remove("progress-step-active");
                }
            });

            const progressActive = document.querySelectorAll(".progress-step-active");

            progress.style.width =
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
        }

        function instructions() {
            Swal.fire({
                title: 'Instructions',
                html: '<p>Make sure to fill all the fields according to your business finance statements.</p>',
                confirmButtonText: 'OK'
            });
        }

        function splash() {
            document.getElementById('splashScreen').style.display = 'flex';
            setTimeout(() => {
                window.location.href = 'index.html';
            }, 2000);
        }

        
    </script>


    < <?php include "inc/all_scripts.php"; ?> </body>

</html>