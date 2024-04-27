<?php
session_start();

// Check if form data is received
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store form data in session variables
    $_SESSION['previewedTitle'] = $_POST['title'];
    $_SESSION['previewedContent'] = $_POST['content'];
} else if (!isset($_SESSION['previewedTitle']) || !isset($_SESSION['previewedContent'])) {
    // Redirect to addPost.php if there is no data to preview
    header("Location: addPost.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View blog</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css" media="screen and (max-width:768px)">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
</head>
<body class="centered-body">

    <div class = "preview-container">
    
        <h1>Preview Post</h1>
        <div>
            <h2>Title:</h2>
            <p><?php echo htmlspecialchars($_SESSION['previewedTitle']); ?></p>
        </div>
        <div>
            <h2>Content:</h2>
            <p><?php echo htmlspecialchars($_SESSION['previewedContent']); ?></p>
        </div>
        <div id="button-container">
            <a href="upload.php" id="upload-button">Upload</a>
            <a href="addPost.php" id="edit-button">Edit</a>
        </div>
    </div>

    <br>
    <br>
    <footer>
        <p>Angela Acharya Lopez - 2024©</p>
    </footer>

    <script src="previewPost.js"></script>
</body>
</html>