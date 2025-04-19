<?php
// Include your database connection
include 'db.php';

// Choose the column to order by (e.g., created_at descending)
$orderBy = "created_at";
$orderDirection = "DESC"; // or "ASC" for oldest to newest

// Build and run the query
$sql = "SELECT id, name, email, created_at FROM users ORDER BY $orderBy $orderDirection";
$result = $conn->query($sql);

// Display the result in an HTML table
echo "<h2>📋 Users Ordered by " . htmlspecialchars($orderBy) . "</h2>";
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
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

echo "</table>";

// Close connection
$conn->close();
?>
