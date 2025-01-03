<?php
	// Matikan tanda "//" kalo mau nyalain localhost xammp
	// $hostname = "localhost";
	// $username = "root";
	// $password = ""; 
	// $dbname = "suitestyle";


	// Matikan tanda "//" kalo mau nyalain cyberpanel
	$hostname = "localhost";
	$username = "suit_id";
	$password = "G-#tnEkuIax4yu61";
	$dbname ="suit_suitstyle";


	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ("Gagal terhubung ke database");
?>