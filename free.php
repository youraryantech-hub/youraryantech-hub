<?php
$firstName = $_POST['Fname'];
$lastName  = $_POST['Lname'];
$email     = $_POST['email'];
$mobNum    = $_POST['mobile'];

$conn = new mysqli('localhost', 'root', '', 'arc_gym');

// Check connection
if ($conn->connect_error) {
    exit(); // stop silently
}

// Prepare SQL
$stmt = $conn->prepare("INSERT INTO free_try (FirstName, LastName, Email, Mobile) VALUES (?, ?, ?, ?)");

// Bind values
$stmt->bind_param("sssi", $firstName, $lastName, $email, $mobNum);

// Execute
$stmt->execute();

// Close
$stmt->close();
$conn->close();

header("Location: nutrition.html?success=1");
exit();
?> 