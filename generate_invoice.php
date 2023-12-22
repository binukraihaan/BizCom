<?php

session_start();
include "inc/connect.php";

$user_id = $_SESSION['user_id'];

$query = "SELECT bd.*, u.business, u.phone, u.address_one, u.address_two, u.city, u.zip_code
    FROM financial_data bd
    JOIN user_data u ON bd.user_id = u.id
    WHERE bd.user_id = '$user_id'
    ORDER BY bd.id DESC LIMIT 1";

$result = mysqli_query($conn, $query);



if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $current_ratio = $row['current_ratio'];
        $cash_ratio = $row['cash_ratio'];
        $debt_ratio = $row['debt_ratio'];
        $equity_ratio = $row['equity_ratio'];
        $gross_profit_margin = $row['gross_profit_margin'];
        $net_profit_margin = $row['net_profit_margin'];


        $cash_health = ($cash_ratio > 35) ? 'The company has the ability to cover all short-term debt' : 'Insufficient cash on hand exists to pay off short-term debt';
        $current_health = ($current_ratio < 1) ? 'The company can meet its short-term obligations without difficulty' : 'The company is less risky from a financial standpoint';
        $debt_health = ($debt_ratio < 30) ? 'The company is less risky from a financial standpoint' : 'The company may struggle in a financial risk';
        $equity_health = ($equity_ratio > 50) ? 'The company is in a lower level of financial risk' : 'The company is in a higher level of financial risk';
        $net_profit_health = ($net_profit_margin > 20) ? 'The company is efficiently controlling its costs and generating a substantial profit relative to its revenue' : 'The company may takes profitability challenges or intense competition in the industry';
        $gross_profit_health = ($gross_profit_margin > 40) ? 'The company is efficiently producing and selling its products or services' : 'The company has higher production costs relative to its revenue';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style type="text/css">
        *,
        ::before,
        ::after {
            box-sizing: border-box;

            border-width: 0;

            border-style: solid;

            border-color: #e5e7eb;

        }

        ::before,
        ::after {
            --tw-content: '';
        }

        html {
            line-height: 1.5;

            -webkit-text-size-adjust: 100%;

            -moz-tab-size: 4;

            tab-size: 4;

            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

            font-feature-settings: normal;

            font-variation-settings: normal;

        }

        body {
            margin: 0;

            line-height: inherit;

        }

        hr {
            height: 0;

            color: inherit;

            border-top-width: 1px;

        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }

        b,
        strong {
            font-weight: bolder;
        }

        code,
        kbd,
        samp,
        pre {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;

            font-size: 1em;

        }

        small {
            font-size: 80%;
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        table {
            text-indent: 0;

            border-color: inherit;

            border-collapse: collapse;

        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;

            font-feature-settings: inherit;

            font-variation-settings: inherit;

            font-size: 100%;

            font-weight: inherit;

            line-height: inherit;

            color: inherit;

            margin: 0;

            padding: 0;

        }

        button,
        select {
            text-transform: none;
        }

        button,
        [type='button'],
        [type='reset'],
        [type='submit'] {
            -webkit-appearance: button;

            background-color: transparent;

            background-image: none;

        }

        :-moz-focusring {
            outline: auto;
        }

        :-moz-ui-invalid {
            box-shadow: none;
        }

        progress {
            vertical-align: baseline;
        }

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto;
        }

        [type='search'] {
            -webkit-appearance: textfield;

            outline-offset: -2px;

        }

        ::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;

            font: inherit;

        }

        summary {
            display: list-item;
        }

        blockquote,
        dl,
        dd,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        figure,
        p,
        pre {
            margin: 0;
        }

        fieldset {
            margin: 0;
            padding: 0;
        }

        legend {
            padding: 0;
        }

        ol,
        ul,
        menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        dialog {
            padding: 0;
        }

        textarea {
            resize: vertical;
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;

            color: #9ca3af;

        }

        button,
        [role="button"] {
            cursor: pointer;
        }

        :disabled {
            cursor: default;
        }

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;

            vertical-align: middle;

        }

        img,
        video {
            max-width: 100%;
            height: auto;
        }

        [hidden] {
            display: none;
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position: ;
            --tw-gradient-via-position: ;
            --tw-gradient-to-position: ;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
        }

        .fixed {
            position: fixed;
        }

        .bottom-0 {
            bottom: 0px;
        }

        .left-0 {
            left: 0px;
        }

        .table {
            display: table;
        }

        .h-12 {
            height: 3rem;
        }

        .w-1\/2 {
            width: 50%;
        }

        .w-full {
            width: 100%;
        }

        .border-collapse {
            border-collapse: collapse;
        }

        .border-spacing-0 {
            --tw-border-spacing-x: 0px;
            --tw-border-spacing-y: 0px;
            border-spacing: var(--tw-border-spacing-x) var(--tw-border-spacing-y);
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .border-b-2 {
            border-bottom-width: 2px;
        }

        .border-r {
            border-right-width: 1px;
        }

        .border-main {
            border-color: #3b4a6b;
        }

        .bg-main {
            background-color: #5c6ac4;
        }

        .bg-slate-100 {
            background-color: #f1f5f9;
        }

        .p-3 {
            padding: 0.75rem;
        }

        .px-14 {
            padding-left: 3.5rem;
            padding-right: 3.5rem;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .pb-3 {
            padding-bottom: 0.75rem;
        }

        .pl-2 {
            padding-left: 0.5rem;
        }

        .pl-3 {
            padding-left: 0.75rem;
        }

        .pl-4 {
            padding-left: 1rem;
        }

        .pr-3 {
            padding-right: 0.75rem;
        }

        .pr-4 {
            padding-right: 1rem;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .align-top {
            vertical-align: top;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-xs {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .italic {
            font-style: italic;
        }

        .text-main {
            color: #3b4a6b;
        }

        .text-neutral-600 {
            color: #525252;
        }

        .text-neutral-700 {
            color: #404040;
        }

        .text-slate-300 {
            color: #cbd5e1;
        }

        .text-slate-400 {
            color: #94a3b8;
        }

        .text-white {
            color: #fff;
        }

        @page {
            margin: 0;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>


</head>

<body>


    <div>
        <div class="py-4">
            <div class="px-14 py-6">
                <table class="w-full border-collapse border-spacing-0">
                    <tbody>
                        <tr>
                            <td class="w-full align-top">
                                <div>
                                    <img src="brand.png" />
                                </div>
                            </td>

                            <td class="align-top">
                                <div class="text-sm">
                                    <table class="border-collapse border-spacing-0">
                                        <tbody>
                                            <tr>
                                                <td class="border-r pr-4">
                                                    <div>
                                                        <p class="whitespace-nowrap text-slate-400 text-right">Date</p>
                                                        <p class="whitespace-nowrap font-bold text-main text-right"><?php echo date("Y/m/d"); ?></p>
                                                    </div>
                                                </td>
                                                <td class="pl-4">
                                                    <div>
                                                        <p class="whitespace-nowrap text-slate-400 text-right">User #</p>
                                                        <p class="whitespace-nowrap font-bold text-main text-right"><?php echo $user_id ?></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-slate-100 px-14 py-6 text-sm">
                <table class="w-full border-collapse border-spacing-0">
                    <tbody>
                        <tr>
                            <td class="w-1/2 align-top">
                                <div class="text-sm text-neutral-600">
                                    <p class="font-bold">BizCom INC</p>
                                    <p>0771958681</p>
                                    <p>32/12 Main Road</p>
                                    <p>Badulla, 90000</p>
                                    <p>Sri Lanka</p>
                                </div>
                            </td>
                            <td class="w-1/2 align-top text-right">
                                <div class="text-sm text-neutral-600">

                                    <?php

                                    $query = "SELECT bd.*, u.business, u.phone, u.address_one, u.address_two, u.city, u.zip_code
                                                FROM financial_data bd
                                                JOIN user_data u ON bd.user_id = u.id
                                                WHERE bd.user_id = '$user_id'
                                                ORDER BY bd.id DESC LIMIT 1";

                                    $result = mysqli_query($conn, $query);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $business = $row['business'];
                                            $phone = $row['phone'];
                                            $address_one = $row['address_one'];
                                            $address_two = $row['address_two'];
                                            $city = $row['city'];
                                            $zip_code = $row['zip_code'];
                                            echo '

                                            <p class="font-bold">' . $business . '</p>
                                            <p>' . $phone . '</p>
                                            <p>' . $address_one . ', ' . $address_two . '</p>
                                            <p>' . $city . ', ' . $zip_code . '</p>

                                            ';
                                        }
                                    }

                                    ?>



                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-14 py-10 text-sm text-neutral-700">
                <table class="w-full border-collapse border-spacing-0">
                    <tr>
                        <td>
                            <p class="pb-3 pl-3 font-bold text-center">Cash Ratio</p>
                            <p class="pb-3 pl-3 font-bold text-main text-center"><?php echo $cash_ratio; ?></p>

                        </td>
                        <td>
                            <p class="pb-3 pl-3 font-bold text-center">Current Ratio</p>
                            <p class="pb-3 pl-3 font-bold text-main text-center"><?php echo $current_ratio; ?></p>

                        </td>
                        <td>
                            <p class="pb-3 pl-3 font-bold text-center">Debt Ratio</p>
                            <p class="pb-3 pl-3 font-bold text-main text-center"><?php echo $debt_ratio; ?></p>

                        </td>
                        <td>
                            <p class="pb-3 pl-3 font-bold text-center">Equity Ratio</p>
                            <p class="pb-3 pl-3 font-bold text-main text-center"><?php echo $equity_ratio; ?></p>

                        </td>
                        <td>
                            <p class="pb-3 pl-3 font-bold text-center">Gross Profit Margin </p>
                            <p class="pb-3 pl-3 font-bold text-main text-center"><?php echo $gross_profit_margin; ?>%</p>

                        </td>
                        <td>
                            <p class="pb-3 pl-3 font-bold text-center">Net Profit Margin</p>
                            <p class="pb-3 pl-3 font-bold text-main text-center"><?php echo $net_profit_margin; ?>%</p>

                        </td>
                    </tr>
                </table>
            </div>

            <div class="px-14 py-10 text-sm text-neutral-700">
                <table class="w-full border-collapse border-spacing-0">
                    <thead>
                        <tr>
                            <td class="border-b-2 border-main pb-3 pl-3 font-bold text-main">#</td>
                            <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Ratio</td>
                            <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Status of your business</td>
                            <td class="border-b-2 border-main pb-3 pl-2 text-center font-bold text-main">Value</td>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-b py-3 pl-3">1.</td>
                            <td class="border-b py-3 pl-2">Current Ratio</td>
                            <td class="border-b py-3 pl-2"><?php echo $current_health; ?>
                            </td>
                            <td class="border-b py-3 pl-2 text-center"><?php echo $current_ratio ?></td>
                        </tr>
                        <tr>
                            <td class="border-b py-3 pl-3">2.</td>
                            <td class="border-b py-3 pl-2">Cash Ratio</td>
                            <td class="border-b py-3 pl-2"><?php echo $cash_health; ?>
                            </td>
                            <td class="border-b py-3 pl-2 text-center"><?php echo $cash_ratio ?></td>
                        </tr>
                        <tr>
                            <td class="border-b py-3 pl-3">3.</td>
                            <td class="border-b py-3 pl-2">Debt Ratio</td>
                            <td class="border-b py-3 pl-2"><?php echo $debt_health; ?>
                            </td>
                            <td class="border-b py-3 pl-2 text-center"><?php echo $debt_ratio ?></td>
                        </tr>
                        <tr>
                            <td class="border-b py-3 pl-3">4.</td>
                            <td class="border-b py-3 pl-2">Equity Ratio</td>
                            <td class="border-b py-3 pl-2"><?php echo $equity_health; ?>
                            </td>
                            <td class="border-b py-3 pl-2 text-center"><?php echo $equity_ratio ?></td>
                        </tr>
                        <tr>
                            <td class="border-b py-3 pl-3">5.</td>
                            <td class="border-b py-3 pl-2">Gross Profit Margin</td>
                            <td class="border-b py-3 pl-2"><?php echo $gross_profit_health; ?>
                            </td>
                            <td class="border-b py-3 pl-2 text-center"><?php echo $gross_profit_margin ?></td>
                        </tr>
                        <tr>
                            <td class="border-b py-3 pl-3">6.</td>
                            <td class="border-b py-3 pl-2">Net Profit Margin</td>
                            <td class="border-b py-3 pl-2"><?php echo $net_profit_health ?>
                            </td>
                            <td class="border-b py-3 pl-2 text-center"><?php echo $net_profit_margin ?></td>
                        </tr>

                        <tr>
                            <td colspan="7">
                                <table class="w-full border-collapse border-spacing-0">
                                    <tbody>
                                        <tr>
                                            <td class="w-full"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button class="btn btn-secondary" style="position: fixed; bottom: 40px; right:50px; border-radius: 50px !important" onclick="printing()"><i class="bi bi-printer"></i></button>

            <p class="text-center mb-2" style="text-transform: capitalize; font-weight:500; color:#3b4a6b;">please consider about the status of your business and makes your future plans.</p>

            <footer class=" bottom-0 left-0 bg-slate-100 w-full text-neutral-600 text-center text-xs py-3">
                BizCom
                <span class="text-slate-300 px-2">|</span>
                binukthegreat@gmail.com
                <span class="text-slate-300 px-2">|</span>
                +94 77 195 8681

            </footer>
        </div>
    </div>

    <script>
        function printing() {
            window.print();
        }
    </script>

</body>

</html>