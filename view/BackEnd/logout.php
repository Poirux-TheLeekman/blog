<?php 
session_start();
unset($_SESSION['IsAdmin']);
//require ('../../index.php');
header("location:index.php");