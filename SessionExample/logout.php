<?php
session_start();
session_unset();
session_destroy();
//redirect to login page
header("location:login.php");
?>