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
<body>
    
    <div class = "viewPost-container">
        <header>
            <nav id = "navigation">
                <h2 class ="name">Angela Acharya Lopez</h2>
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

        <br>
        <form method="post" action="">
            <label for="month">Select a month to view:</label>
            <select name="month" id="month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <input type="submit" value="Filter">
        </form>

        <?php
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

        // Retrieve selected month from the HTML form
        $selected_month = isset($_POST['month']) ? $_POST['month'] : null;

        // Prepare SQL query
        $sql = "SELECT title, content, time FROM blogs";
        if ($selected_month) {
            $sql .= " WHERE MONTH(time) = $selected_month";
        }

        // Execute SQL query
        $result = $conn->query($sql);

        // Store blog posts in an array
        $posts = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
        }

        // Bubble sort algorithm to sort posts based on time in descending order
        $n = count($posts);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if (strtotime($posts[$j]['time']) < strtotime($posts[$j + 1]['time'])) {
                    // Swap posts
                    $temp = $posts[$j];
                    $posts[$j] = $posts[$j + 1];
                    $posts[$j + 1] = $temp;
                }
            }
        }

        // Display sorted blog posts
        foreach ($posts as $post) {
            echo "<article class='post'>";
            echo "<h1>" . $post['title'] . "</h1>";
            echo "<p><strong>Date: " . date("jS F Y, g:i A", strtotime($post['time'])) . " UTC</strong></p>";
            echo "<p>" . $post['content'] . "</p>";
            echo "</article>";
            echo "<hr>";
        }

        $conn->close();
        ?>

        <br>
        <div class="add-post-button">
            <a href="addPost.php" class="button">Add Post</a>
        </div>

        <br>
        <br>
        <footer>
            <p>Angela Acharya Lopez - 2024©</p>
        </footer>

    </div>
</body>
</html>