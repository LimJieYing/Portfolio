<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a blog</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/blog.css">
    <script src="javascript/validateEntry.js" defer></script>
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

    <?php
    // Start the session and display the users name, allows them to logout as well.
    session_start();

    if (isset($_SESSION['UserID'])) {
        echo " <article>";
        echo "Welcome " . $_SESSION['UserID'] . "!";

        echo "<button> 
                <a href='logout.php'> Logout </a>
            </button>";

        echo "<article>";
        
    }

    ?>

    <main>
        <form action="addEntry.php" method="post" id="addBlogForm">
            <fieldset>
                <legend>
                    Add Blog
                </legend>

                <table>
                    
                    <tr>
                        <td id="titleInput">
                            <label for="title">Title:</label>
                            <br>
                            <input type="text" name="title" id="title" placeholder="Title" value="<?php echo isset($_SESSION['title']) ? $_SESSION['title'] : ''; ?>" >
                        </td>
                    </tr>
                    

                    <tr>
                        <td id="contentInput">
                            <label for="content">Write your content here:</label>
                            <br>
                            <textarea name="content" id="content" cols="55" rows="30" placeholder="Content"><?php echo isset($_SESSION['content']) ? $_SESSION['content'] : ''; ?></textarea>
                        </td>
                    </tr>
                </table>


                <section id="container">
                    <button type="submit" >
                        Submit
                    </button>
                    <button id="preview" >
                            Preview
                    </button>
                    <button type="reset" id="clear">
                        Clear
                    </button>
                </section>
            </fieldset>
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
</body>

</html>