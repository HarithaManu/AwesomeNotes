<!-- view_note.php -->
<?php
    require_once('config.php');
    require_once('class/controller.class.php');   
?>
<!DOCTYPE html>
<html>
<head>
    <title>Note Details</title>
    
</head>
<body>

    <?php
    // Connect to the database
    $connection = new mysqli("localhost", "root", "", "note_taking_db");

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Check if the note ID is provided in the URL
    if (isset($_GET["id"])) {
        $noteId = $_GET["id"];

        // Fetch note details from the database
        $query = "SELECT title, content, id FROM notes WHERE id = " . $noteId;
        $result = $connection->query($query);

        // Display note details
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $title = $row["title"];
            $content = $row["content"];
            

            echo '<h2>' . $title . '</h2>';
            echo '<p>' . $content . '</p>';
            echo '<li><h8><a href="edit_note.php?id=' . $row["id"] . '"> Update </a></h8></li>
                  <li><h8><a href="delete_note.php?id=' . $row["id"] . '"> Delete </a></h8></li>';
        } 
        else {
            echo "Note not found.";
        }
    }

    // Close the database connection
    $connection->close();
    ?>
</body>
</html>
