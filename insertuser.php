<?php
require_once 'db.php'; // uses your existing connection file

try {
    // Sample user data — change this if needed
    $name = "John Doe";
    $email = "john@example.com";

    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    echo "✅ User inserted successfully!";
} catch(PDOException $e) {
    echo "❌ Error inserting user: " . $e->getMessage();
}
?>
