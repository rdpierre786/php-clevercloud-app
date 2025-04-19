<?php
// Include database connection
include 'db.php';

// Set criteria (you can also get this from user input if needed)
$searchName = "Secure User";

// Prepare a secure SQL statement
$stmt = $conn->prepare("SELECT id, name, email, created_at FROM users WHERE name = ?");
$stmt->bind_param("s", $searchName);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Display the result
echo "<h2>🔍 Users with Name: '$searchName'</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Registered</th></tr>";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No matching records found</td></tr>";
}

echo "</table>";

// Close
$stmt->close();
$conn->close();
?>
