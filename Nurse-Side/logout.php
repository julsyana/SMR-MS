<?php 
session_start();

unset($_SESSION['emp_id']);

header("Location: index.php");