<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css" media="screen and (max-width:768px)">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">

</head>
<body>
    
    <div class="addPost-container">

        <header>
            <nav id="navigation">
                <h2 class="name">Angela Acharya Lopez</h2>
                <ul>
                    <li><a href="index.html">About Me</a></li>
                    <li><a href="index.html">Skills</a></li>
                    <li><a href="education.html">Education</a></li>
                    <li><a href="experience.html">Experience</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="index.html">Contact</a></li>
                    <li><a href="viewPost.php">Blog</a></li>
                </ul>
            </nav>
        </header>
        
        <div class="message-container">
            <aside>
                <?php
                session_start();
                // Check if user is not logged in, redirect to login page
                if (!isset($_SESSION['email'])) {
                    header("Location: login.html");
                    exit;
                }

                echo "<div class='welcome'>";
                echo "Welcome to the blog, " . $_SESSION['email'] . ", you are now logged in and may add posts.";
                echo "<form action='logout.php' method='post'>";
                echo "<button type='submit'>Logout</button>";
                echo "</form>";
                echo "</div>";
                ?>
            </aside>

            <form id="postForm" method="POST" action="preview.php">
                <h1>Add new post</h1>
                <fieldset class="blog">
                    <div>
                        <label>Title:</label>
                        <br>
                        <input type="text" name="title" id="title">
                    </div>
                    
                    <div class="content">
                        <label>Enter text here:</label>
                        <br>
                        <textarea name="content" id="content"></textarea>
                    </div>
            
                    <div class="buttons">
                        <button id="post" type="click">Preview</button>
                        <button id="clear" type="button">Clear Form</button>
                    </div>
                </fieldset>
            </form>
        </div>

        <footer>
            <p>Angela Acharya Lopez - 2024©</p>
        </footer>

    </div>

    <script src = "previewPost.js"></script>
    <script src= "validation.js"></script>

</body>
</html>
