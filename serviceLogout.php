<?php
session_start();
unset($_SESSION['SID']);


header('location:HomePage.php');
die();

?>