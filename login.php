<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check credentials against users table
    $sql = "SELECT * FROM USERS WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // successful sessions
        $_SESSION['email'] = $email; 
        $_SESSION['loggedIn'] = true; 

        
        header("Location: addPost.php");
        exit; 
    } else {
        
        $_SESSION['message'] = "<p>Invalid email or password. Please try again.</p>";
        header("Location: login.html");
        exit;
    }
}
?>