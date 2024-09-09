<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $fname = $_POST['Firstname'];
        $sname = $_POST['Surname'];
        $email = $_POST['Email'];
        $pass1 = $_POST['Password'];

        $servername = "127.0.0.1";
        $username ="root";
        $password = "";
        $dbname = "ecs417";

        // establish connection
        $conn = new mysqli($servername, $username, $password, $dbname);


        if($_SERVER["REQUEST_METHOD"] == "POST") {
            //add to users table
            $sql = "INSERT INTO users (firstName, lastName, email, password) 
            VALUES ('$fname', '$sname', '$email', '$pass1')";
        }

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
    ?>
</body>
</html>