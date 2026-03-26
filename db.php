<?php

$dsn = "mysql:host=localhost;dbname=hackathon;";
$user = "root";
$pwd = "";

try {
    $conn = new PDO($dsn, $user, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
