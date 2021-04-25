<?php
session_start();

if (!isset($_SESSION['user_initial'])) {
    header("location: includes/pages/login.php");
    die();
}

include "includes/php/config.php";
