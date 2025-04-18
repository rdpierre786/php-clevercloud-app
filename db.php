<?php
// Replace these values with the actual ones from Clever Cloud dashboard
$host = "bpuf5erzz60mkieu7zm3-mysql.services.clever-cloud.com";         // e.g., bq1xl9zuvh1smuq5.clevercloud.mysql
$port = "3306";                 // Usually this is 3306
$user = "ureheqzyln1zcuni";         // e.g., ut8gl1ntrf7pzgqf
$password = "RVnPy6lkITO1NVB19aRF"; // Your actual password
$dbname = "bpuf5erzz60mkieu7zm3";       // e.g., bq1xl9zuvh1smuq5

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Connected successfully to Clever Cloud MySQL!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>
