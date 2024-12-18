<?php
$host = 'localhost';    // Database host
$dbname = 'soundcas_fin'; // Database name
$username = 'soundcas_fin';     // Database username
$password = 'soundcas_fin';         // Database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
