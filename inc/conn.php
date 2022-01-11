<?php

// definovanie premennych pre pripojenie k databaze

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "courses_shop";

// samotne pripojenie k databaze pomocou premennej $conn

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// podmienka, ak sa k databaze nepodari pripojit

if (!$conn) {
	die("Database connection failed!");
}
