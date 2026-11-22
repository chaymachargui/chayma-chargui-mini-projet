<?php
$host='localhost'; 
$dbname='portfolio_chayma'; 
$user='root'; 
$password='';
$dsn="mysql:host=$host;
dbname=$dbname;charset=utf8mb4";
try{$pdo=new PDO($dsn,$user,$password,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);}
catch(PDOException $e){http_response_code(500);
die('Connexion MySQL impossible. Démarre MySQL dans XAMPP puis importe sql/portfolio.sql dans phpMyAdmin.');}