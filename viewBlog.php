<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to my blog</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/viewBlog.css">

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
        <h1>Blog</h1>

        <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "ecs417";

            $conn = new mysqli($servername, $username, $password, $dbname);
            


        ?>

        <!-- form for month selector -->
        <form action="" method="post" id="monthSelector">
            <select name="month" id="month" onchange="this.form.submit()">
                <option value="" disabled selected>Please Select</option>
                <option value="all" <?php if (isset($_POST['month']) && $_POST['month'] == "all") echo "selected"; ?>>
                    All Enteries
                </option>
                <option value="01" <?php if (isset($_POST['month']) && $_POST['month'] == "01") echo "selected"; ?>>
                    January
                </option>
                <option value="02" <?php if (isset($_POST['month']) && $_POST['month'] == "02") echo "selected"; ?>>
                    February
                </option>
                <option value="03" <?php if (isset($_POST['month']) && $_POST['month'] == "03") echo "selected"; ?>>
                    March
                </option>
                <option value="04" <?php if (isset($_POST['month']) && $_POST['month'] == "04") echo "selected"; ?>>
                    April
                </option>
                <option value="05" <?php if (isset($_POST['month']) && $_POST['month'] == "05") echo "selected"; ?>>
                    May
                </option>
                <option value="06" <?php if (isset($_POST['month']) && $_POST['month'] == "06") echo "selected"; ?>>
                    June
                </option>
                <option value="07" <?php if (isset($_POST['month']) && $_POST['month'] == "07") echo "selected"; ?>>
                    July
                </option>
                <option value="08" <?php if (isset($_POST['month']) && $_POST['month'] == "08") echo "selected"; ?>>
                    August
                </option>
                <option value="09" <?php if (isset($_POST['month']) && $_POST['month'] == "09") echo "selected"; ?>>
                    September
                </option>
                <option value="10" <?php if (isset($_POST['month']) && $_POST['month'] == "10") echo "selected"; ?>>
                    October
                </option>
                <option value="11" <?php if (isset($_POST['month']) && $_POST['month'] == "11") echo "selected"; ?>>
                    November
                </option>
                <option value="12" <?php if (isset($_POST['month']) && $_POST['month'] == "12") echo "selected"; ?>>
                    December
                </option>

            </select>

        </form>

        <button id="add">
            <a href="login.php">Add Blog</a>
        </button>


        <?php

            //if statement for sql queries
            //if month is slelcted, select entries with the particular month only. If not, then select all entries.
            if (isset($_POST['month']) && $_POST['month'] != "all") {
                $month = $_POST['month'];
                $sql = "SELECT title, author, DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y-%m-%d') as date, time, content FROM blogenteries 
                WHERE MONTH(STR_TO_DATE(date, '%d-%m-%Y')) = $month";
            } else {
                $sql = "SELECT title, author, DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y-%m-%d') as date, time, content FROM blogenteries";
            }


            $result = $conn->query($sql);

            //The following code is written by Generative AI (github co-pilot) as per requirements for the Sorting algorithm
            // Fetch all blog entries and store them in an array
            $blogEntries = array();
            while($row = $result->fetch_assoc()) {
                $blogEntries[] = $row;
            }
            
            
            // Implement Bubble Sort to sort the array by date and time
            for($i = 0; $i < count($blogEntries); $i++) {
                for($j = 0; $j < count($blogEntries) - $i - 1; $j++) {
                    // Combine the date and time into a single DateTime object for comparison
                    $datetime1 = DateTime::createFromFormat('Y-m-d H:i:s', $blogEntries[$j]['date'] . ' ' . $blogEntries[$j]['time']);
                    $datetime2 = DateTime::createFromFormat('Y-m-d H:i:s', $blogEntries[$j + 1]['date'] . ' ' . $blogEntries[$j + 1]['time']);
            
                    // Swap the blog entries if the current entry is newer than the next one
                    if($datetime1 < $datetime2) {
                        $temp = $blogEntries[$j];
                        $blogEntries[$j] = $blogEntries[$j + 1];
                        $blogEntries[$j + 1] = $temp;
                    }
                }
            }

        
            // the following code was MODIFIED by GitHub Co-pilot to display all the entries. 
            //Structure of the semantic html elements, setting timezone and content organisation was written by Lim Jie Ying. 

            date_default_timezone_set('UTC');
            $timezone = date_default_timezone_get();

            // Display the sorted blog entries
            foreach($blogEntries as $entry) {
                echo "<article>";
            
                echo "<section id='container'>";
                echo "<h2> Title: " . $entry["title"] . "</h2>";
            
                // Create a DateTime object from the date
                $date = DateTime::createFromFormat('Y-m-d', $entry["date"]);
            
                // Format the date as 'd-m-y' and display it
                echo "<aside> Date posted: " . $date->format('d-F-y') . " <br> Time: " . $entry["time"] . $timezone .  "</aside>";
                echo "</section>";
            
                echo "<section>";
                echo "<p> Author: " . $entry["author"]. "</p>";
                echo "</section>";
            
                echo "<section>";
                echo "<p> &nbsp; &nbsp; " . $entry["content"] . "</p>";
                echo "</section>";
            
                echo "</article>";
            }
            //End of code written by Generative AI

            $conn->close();


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