<?php
// Include database connection
include 'db.php';

// Define how many records you want to retrieve
$limit = 5;

// Query with LIMIT
$sql = "SELECT * FROM users LIMIT ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $limit);
$stmt->execute();

// Get the results
$result = $stmt->get_result();

// Display the results
if ($result->num_rows > 0) {
    echo "<h3>🔢 Showing up to $limit users:</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Registered: " . $row["created_at"] . "<br><br>";
    }
} else {
    echo "No records found.";
}

// Close connection
$stmt->close();
$conn->close();
?>
