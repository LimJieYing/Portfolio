
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="javascript/validateLogin.js" defer></script>
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

        <?php

        session_start();

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ecs417";
        // establish connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "SELECT firstName ,email, password FROM users WHERE email = '$email' AND password = '$password'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $_SESSION['UserID'] = $user['firstName'];

                    echo "Login successful <br>";
                } else {
                    echo " <div>Login failed. Please enter a correct email and password.  </div>";
                }
            
        }

        //redirect to addBlog.php (if logged in)
        if (isset($_SESSION['UserID'])) {
            header('Location: addBlog.php');
        } else {

        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
                <fieldset>
                    <legend>
                        Login
                    </legend>

                    <table>
                        <tr>
                            <td id="emailInput">
                                <label for="email">Email Address:</label>
                                <br>
                                <input type="email" name="email" id="email" placeholder="john@gmail.com">
                            </td>
                        </tr>

                        <tr>
                            <td id="passwordInput">
                                <label for="password">Password:</label>
                                <br>
                                <input type="password" name="password" id="password" placeholder="Password">
                            </td>
                        </tr>
                    </table>

                    <section>

                        <button type="submit" value="Submit"> Submit</button>
                        <button type="reset" value="Reset"> Reset</button>
                    </section>
                </fieldset>

                <p>
                    Don't have an account? <a href="register.html">Please Register here!</a>
                </p>
            </form>
        <?php
        }
        ?>
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