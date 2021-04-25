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
    <link rel="stylesheet" href="../../assets/plugins/bootstrap/css/bootstrap.min.css" />

    <!-- Plugins css -->
    <link rel="stylesheet" href="../../assets/plugins/charts-c3/c3.min.css" />

    <!-- Core css -->
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="stylesheet" href="../../assets/css/theme1.css" />
</head>

<body class="font-montserrat">
    <div class="auth">
        <div class="auth_left">
            <div class="card">
                <div class="text-center mb-2">
                    <i class="im im-sign-in"></i>
                </div>
                <div class="card-body">
                    <div class="card-title">Login to your account</div>
                    <div class="form-group">
                        <form action="" method="POST">
                            <select name="job_title" class="custom-select mb-3" required>
                                <option>Project Manager</option>
                                <option>Developer</option>
                            </select>
                            <input type="text" class="form-control mb-3" style="text-transform: uppercase" id="exampleInputInitial" aria-describedby="initialHelp" name="initial" required placeholder="Enter initial">
                            <label class="form-label">Password<a href="forgot-password.php" class="float-right small">I forgot password</a></label>
                            <input type="password" class="form-control  mb-3" id="exampleInputPassword1" name="password" required placeholder="Password">
                            <!-- <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" />
                                <span class="custom-control-label">Remember me</span>
                            </label> -->
                            <?php
                            include("../php/config.php");
                            session_start();

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // username and password sent from form 

                                $myinitial = mysqli_real_escape_string($db, $_POST['initial']);
                                $mypassword = mysqli_real_escape_string($db, $_POST['password']);
                                $job_title = mysqli_real_escape_string($db, $_POST['job_title']);


                                $sql = "SELECT id, job_title FROM employee WHERE job_title = '$job_title' and initial = '$myinitial' and password = '$mypassword'";
                                $result = mysqli_query($db, $sql);

                                $row = mysqli_fetch_assoc($result);

                                $count = mysqli_num_rows($result);

                                // If result matched $myinitial and $mypassword, table row must be 1 row
                                if ($count == 1) {
                                    $_SESSION['user_initial'] = $myinitial;
                                    $_SESSION['job_title'] = $row['job_title'];

                                    header("location: ../../index.php");
                                } else {

                                    echo "<div class=\"tag-danger text-white \"><p class=\"small text-center \">Try entering the correct data</p></div>";
                                }
                            }
                            ?>
                            <input class="btn btn-primary btn-block" type="submit" value=" Sign in " />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="assets/js/core.js"></script>
</body>

</html>