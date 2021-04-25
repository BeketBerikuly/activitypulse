<?php
include('includes/php/session.php');
require "includes/php/logout.php";
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon-->
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- icon pack-->
    <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">

    <title>Activity monitoring</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

    <!-- Plugins css -->
    <link rel="stylesheet" href="assets/plugins/charts-c3/c3.min.css" />

    <!-- Core css -->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme1.css" />
    <style>
        ::-webkit-input-placeholder {
            text-transform: initial;
        }

        :-moz-placeholder {
            text-transform: initial;
        }

        ::-moz-placeholder {
            text-transform: initial;
        }

        :-ms-input-placeholder {
            text-transform: initial;
        }

        .btn-green {
            background-color: #5cb85c;
            border-color: #5cb85c
        }

        .btn-danger {
            background-color: #E74C3C;
            border-color: #E74C3C
        }
    </style>
</head>

<body class="font-montserrat">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>

    <div id="main_content">
        <?php include "includes/templates/left_menu.php" ?>
        <?php include "includes/templates/settings.php" ?>
        <?php include "includes/templates/sidebar.php" ?>

        <?php
        $content = isset($_GET['content_id']) ? $_GET['content_id'] : '';

        $emp_dash = "";

        if ($_SESSION['job_title'] == "Project Manager") {
            $emp_dash = "dashboard";
        } elseif ($_SESSION['job_title'] == "Developer") {
            $emp_dash = "dev_dashboard";
        }

        switch ($content) {
            case "dashboard":
                include "includes/templates/" . $emp_dash . ".php";
                break;
            case "project":
                include "includes/templates/project_list.php";
                break;
            case "activity":
                include "includes/templates/activity_list.php";
                break;
            case "contacts":
                include "includes/templates/contacts.php";
                break;
            default:
                include "includes/templates/" . $emp_dash . ".php";
        }
        ?>

    </div>


    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="assets/bundles/apexcharts.bundle.js"></script>
    <script src="assets/bundles/counterup.bundle.js"></script>
    <script src="assets/bundles/knobjs.bundle.js"></script>
    <script src="assets/bundles/c3.bundle.js"></script>
    <script src="assets/js/core.js"></script>
    <script src="assets/js/page/project-index.js"></script>
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/bundles/nestable.bundle.js"></script>
    <script src="assets/js/page/sortable-nestable.js"></script>
    <script src="assets/js/chart/knobjs.js"></script>
</body>

</html>