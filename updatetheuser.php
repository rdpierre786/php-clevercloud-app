<?php
// Include your database connection
include 'db.php';

// Define the values to update
$targetEmail = "secureuser@example.com"; // Email of the user to update
$newName = "Updated User";               // New name
$newEmail = "updateduser@example.com";   // New email
$newCreatedAt = "2025-04-19 00:00:00";   // New registration date

// Prepare the update query
$stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, created_at = ? WHERE email = ?");
$stmt->bind_param("ssss", $newName, $newEmail, $newCreatedAt, $targetEmail);

// Execute the query and check if successful
if ($stmt->execute()) {
    echo "<p>✅ User with email '$targetEmail' updated successfully.</p>";
} else {
    echo "<p>❌ Error updating user: " . $stmt->error . "</p>";
}

// Close
$stmt->close();
$conn->close();
?>
