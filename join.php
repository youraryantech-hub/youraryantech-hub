<?php
$firstName = $_POST['name'];
$email     = $_POST['email'];
$mobNum    = $_POST['number'];
$plan      = $_POST['plans'];

$conn = new mysqli('localhost', 'root', '', 'arc_gym');

// Check connection
if ($conn->connect_error) {
    exit(); // stop silently
}

// Prepare SQL
$stmt = $conn->prepare("INSERT INTO join_table (FirstName, Email, Mobile, Plan) VALUES (?, ?, ?, ?)");

// Bind values
$stmt->bind_param("ssis", $firstName, $email, $mobNum, $plan);

// Execute
$stmt->execute();

// Close
$stmt->close();
$conn->close();

header("Location: index.html?success=1");
exit();
?> 