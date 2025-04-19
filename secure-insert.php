<?php
// Include database connection
include 'db.php';

// Sample user data (replace this with dynamic input if needed)
$name = "Secure User";
$email = "secureuser@example.com";

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");

if ($stmt === false) {
    die("❌ Prepare failed: " . htmlspecialchars($conn->error));
}

// Bind parameters to the placeholders (s = string)
$stmt->bind_param("ss", $name, $email);

// Execute the statement
if ($stmt->execute()) {
    echo "✅ Record inserted successfully! ID: " . $stmt->insert_id;
} else {
    echo "❌ Error: " . htmlspecialchars($stmt->error);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
