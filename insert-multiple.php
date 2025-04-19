<?php
// db.php contains your database connection code
include 'db.php';

// Prepare multiple insert values
$users = [
    ['Alice Johnson', 'alice@example.com'],
    ['Bob Smith', 'bob@example.com'],
    ['Charlie Brown', 'charlie@example.com']
];

$sql = "INSERT INTO users (name, email) VALUES ";
$values = [];

foreach ($users as $user) {
    $name = mysqli_real_escape_string($conn, $user[0]);
    $email = mysqli_real_escape_string($conn, $user[1]);
    $values[] = "('$name', '$email')";
}

$sql .= implode(', ', $values);

if ($conn->query($sql) === TRUE) {
    echo "✅ Records inserted successfully!";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
