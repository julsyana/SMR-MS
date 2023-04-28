<?php

$conn = mysqli_connect("localhost", "root", "", "clinicms_db");

if (!$conn) {
	echo "Connection failed!";
}


$conn1 = mysqli_connect("localhost", "root", "", "clinicms_db_test");

if (!$conn1) {
	echo "Connection failed!";
}


