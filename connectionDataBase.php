<?php 
$username = "root";
$password = "";

$pdo = new PDO("mysql:host=localhost;dbname=task2_database;charset=utf8",$username,$password,[
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
