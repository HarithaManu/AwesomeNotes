<!-- home.php -->
<?php
    require_once('config.php');
    require_once('class/controller.class.php');
    
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>A Note-Taking tool</title>
   <!-- <script src="particles.js"></script> -->
    <style>
        /* ... existing styles ... */
        body{
            background-image: url('LUT\ campus.jpg');
            background-position: center;
            background-size: cover;
        }
        .container {
            
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form {
            max-width: 500px;
            margin: 0 auto;
        }

        .form input[type="text"],
        .form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form input[type="submit"] {
            background-color: #4CAF50; 
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }

        .form input[type="submit"]:hover {
            background-color: #4CAF50;
        }

        .notes {
            list-style-type: none;
            padding: 0;
        }

        .notes li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <!-- Particle animation container -->
    <div id="particles-js"></div>

    <!-- Particle animation configuration -->
    <script>
        particlesJS("particles-js", {
            particles: {
                // ... particle configuration ...
            },
            interactivity: {
                // ... interactivity configuration ...
            },
            retina_detect: true
        });
    </script>

    <!-- Content section -->
    <div class="container">
        <div class="header">
        <?php 
        if (isset($_COOKIE["g_id"]) && isset($_COOKIE["sess"])){
            $loginID = $_COOKIE["g_id"];
            $session = $_COOKIE["sess"];
            //$f_name = $userInfo['f_name'];
            $Controller = new Controller;
            //$userInfo = $Controller -> getUserInfo($loginID);
            //$f_name = isset($userInfo['f_name']) ? $userInfo['f_name'] : '';
            if($Controller -> checkUserStatus($_COOKIE["g_id"],$_COOKIE["sess"])){
                //$loginID = $_COOKIE["g_id"];
               echo '<a href = "logout.php"> LOG OUT</a>';
            }else{
                echo "Error while logging in";
            }
        }else{
            echo "No cookie";
        }
        if (isset($_COOKIE["g_id"]) && isset($_COOKIE["sess"])){
            
        }


          //echo '<h3>Welcome ' .$insertUser["g_id"] . '</h3' ;
        ?>
            <h1>Your awesome notes find a home here!</h1>
        </div>
        <div class="form">
            <form action="add_note.php" method="post">
                <input type="text" name="title" placeholder="Note Title" required>
                <textarea name="content" placeholder="Note Content" rows="6" required></textarea>
                <input type="submit" value="Save Note">
            </form>
        </div>
        <div class="notes">
            <h2>My Notes</h2>
            <ul>
                <?php
                 
                // Connect to the database
                $connection = new mysqli("localhost", "root", "", "note_taking_db");

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                //check if user is logged in
               // function checkUserStatus()

                

                // Fetch notes from the database
                $query = "SELECT id, title, created_at, g_id FROM notes WHERE g_id = $loginID";
                $result = $connection->query($query);

                // Display notes
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li><a href="view_note.php?id=' . $row["id"] . '">' . $row["title"] . '</a></li>';
                        echo "Created on ", $row["created_at"];
                        
                    }
                } else {
                    echo "<li>No notes found.</li>";
                }

                // Close the database connection
                $connection->close();
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
