<?php 
session_start();
unset($_SESSION['IsAdmin']);
unset($_POST['author']);

//require ('../../index.php');
header("location:index.php");