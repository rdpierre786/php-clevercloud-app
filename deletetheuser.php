<?php
// Include your database connection
include 'db.php';

// Example: delete user by email
$targetEmail = "secureuser@example.com";

// Prepare and execute the delete statement
$stmt = $conn->prepare("DELETE FROM users WHERE email = ?");
$stmt->bind_param("s", $targetEmail);

if ($stmt->execute()) {
    echo "<p>🗑️ User with email '$targetEmail' deleted successfully.</p>";
} else {
    echo "<p>❌ Error deleting user: " . $stmt->error . "</p>";
}

// Close
$stmt->close();
$conn->close();
?>
