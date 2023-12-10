<!-- edit_note.php -->
<html>
    <head>
        <style>
        
        /* Add CSS for the background image */
        body {
            background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            text-align: center;
        }
    </style>
        
    </head>
<body>
<?php

// Ensure this file handles only POST requests
//if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //  Validate the input and sanitize data
    //$title = htmlspecialchars($_POST["title"]);
    //$content = htmlspecialchars($_POST["content"]);

    //  Update the note in the database

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
    
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $content = $row["content"];
        
        echo '<form method="POST">
            <li><a href="view_note.php?id=' . $row["id"] . '">' . $row["title"] . '</a></li>
            <input type ="text" name="title" style ="width:250px;" value ="'. $row["title"] .'"><br/>
                <textarea name="content" rows ="30" cols = "40"> '. $row["content"] .'</textarea>
                <input type ="submit" value = "Update">
                
                
            </form>';

        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
                $title = htmlspecialchars($_POST["title"]);
                $content = htmlspecialchars($_POST["content"]);
                $id = $row["id"];
                
                $query = "UPDATE notes SET title = '$title', content = '$content' WHERE id = $id";
                if ($connection->query($query) === TRUE) {
                    echo "Note updated successfully";
                } else {
                    echo "Error updating record: " . $db->error;
                }
            }
        
    } 
    else {
        echo "Note not found.";
    }



    // Bind the parameters to the statement
   // $stmt->bind_param("ss", $title, $content);

    // Redirect back to the view_note.php page with the updated note
    if (isset($_POST["note_id"])) {
        header("Location: view_note.php?id=" . $_POST["note_id"]);
        exit;
    }
}
// } 
?>
</body>
</html>