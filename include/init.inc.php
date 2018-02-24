<?php include 'config.inc.php';

$pdo = new Pdo('mysql:host=localhost;dbname=' . DB_NAME, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);

//const PUBLIC_URL = $_SERVER['DOCUMENT_ROOT'];

session_start();
