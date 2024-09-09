<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/viewBlog.css">
    <link rel="stylesheet" href="css/preview.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <button>
                        <a href="portfolio.html">
                            <img class="logo" src="images/JYLogo.png" alt="JY Logo">
                        </a>
                    </button>
                </li>
                <li><a href="about.html">About me</a></li>
                <li><a href="skills.html">Skills</a></li>
                <li><a href="education.html">Education</a></li>
                <li><a href="experience.html">Experience</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="viewBlog.php">Blog</a></li>
            </ul>
        </nav>

    </header>

    <main>
        <h1>
            Preview
        </h1>

        <?php
            session_start();

            //stored in session as the info needs to be retained if user goes back to edit
            $_SESSION['title'] = isset($_POST['title']) ? $_POST['title'] : '';
            $_SESSION['content'] = isset($_POST['content']) ? $_POST['content'] : '';

    
            //data automatically retrieved from session
            $author = $_SESSION['UserID'];
            $date = date("d-F-Y");
            $time = date("H:i:s");
            
            date_default_timezone_set('UTC');
            $timezone = date_default_timezone_get();


            //display previewed Blog. copied from viewBlog.php to give best representation
            echo "<article>";
            
            echo "<section id='container'>";
            echo "<h2> Title: " . $_SESSION['title'] . "</h2>";
                
            echo "<aside> Date posted: " . $date . " <br> Time: " . $time . $timezone.  "</aside>";
            echo "</section>";
            
            echo "<section>";
            echo "<p> Author: " . $author. "</p>";
            echo "</section>";
            
            echo "<section>";
            echo "<p> &nbsp; &nbsp; " . $_SESSION['content'] . "</p>";
            echo "</section>";
            
            echo "</article>";
        ?>

        <!-- form for nav links -->
        <form action="addEntry.php" method="post" id="addBlogForm">
            <input type="hidden" name="title" value="<?php echo $_SESSION['title']; ?>">
            <input type="hidden" name="content" value="<?php echo $_SESSION['content']; ?>">

            <a id="edit" href="addBlog.php">Back to Edit</a>
            
            <button type="submit" id="submitButton">
                Submit
            </button>


        </form>

        
    </main>


    <footer>
        <p>
            <i>Copyright &#169; 2024 Lim Jie Ying</i>
        </p>
        <p>
            <a href="#top">Back to top</a>
        </p>
    </footer>

</header>
</body>
</html>