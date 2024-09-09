<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add entry</title>
</head>
<body>
    <?php

        session_start();
        //data got from form in addBlog.php
        $title = $_POST['title'];
        $content = $_POST['content'];

        //data automatically retrieved from session
        $author = $_SESSION['UserID'];
        $date = date("d-m-Y");
        $time = date("H:i:s");

        

        $servername = "127.0.0.1";
        $username ="root";
        $password = "";
        $dbname = "ecs417";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $sql = "INSERT INTO blogenteries (title, author, date, time, content) 
            VALUES ('$title', '$author', '$date', '$time', '$content')";
        }

        if ($conn->query($sql) === TRUE) {
            //redirect user to viewBlog.php to display the blog
            header('Location: viewBlog.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
        //reset title and content so it does not apprar again after submit
        unset($_SESSION['title']);
        unset($_SESSION['content']);
    ?>
</body>
</html>