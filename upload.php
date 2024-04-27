<?php
session_start();

// Check if there is data to upload
if (!isset($_SESSION['previewedTitle']) || !isset($_SESSION['previewedContent'])) {
    header("Location: addPost.php");
    exit;
}

$title = $_SESSION['previewedTitle'];
$content = $_SESSION['previewedContent'];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecs417";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into blogs table
$sql = "INSERT INTO blogs (title, content) VALUES ('$title', '$content')";

// Check if insertion was successful
if ($conn->query($sql) === TRUE) {
    echo "<p>New blog post added successfully!</p>";
    header("Location: viewPost.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
