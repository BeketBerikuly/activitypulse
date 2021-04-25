<?php

if (isset($_GET['logout'])) {
    unset($_SESSION["user_initial"]);
    header("location: includes/pages/login.php");
    exit();
}
