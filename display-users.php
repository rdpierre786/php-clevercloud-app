<?php
// Include your Clever Cloud database connection
include 'db.php';

// Run the SELECT query
$sql = "SELECT id, name, email, created_at FROM users";
$result = $conn->query($sql);

// Start HTML output
echo "<h2>📋 Registered Users</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Registered</th></tr>";

if ($result && $result->num_rows > 0) {
    // Loop through and display each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

echo "</table>";

// Close connection
$conn->close();
?>
