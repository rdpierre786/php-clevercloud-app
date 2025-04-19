<?php
require_once 'db.php'; // this connects to your Clever Cloud MySQL

try {
    // Sample user data — change these values as needed
    $name = "Randy Pierre";
    $email = "randyp@fiu.com";

    // Prepare and execute the insert
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Get the last inserted ID
    $lastId = $conn->lastInsertId();

    echo "✅ User inserted successfully! Last inserted ID: " . $lastId;

} catch(PDOException $e) {
    echo "❌ Error inserting user: " . $e->getMessage();
}
?>