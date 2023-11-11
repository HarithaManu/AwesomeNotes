<!-- delete_note.php -->
<?php
// Ensure this file handles only POST requests
//if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // TODO: Validate the input and sanitize data

    // TODO: Delete the note from the database
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
                <input type ="text" name="title" value ="'. $row["title"] .'"><br/>
                <textarea name="content" rows ="10"> '. $row["content"] .'</textarea>
                <input type ="submit" value = "Delete">
                
            </form>';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
                $title = htmlspecialchars($_POST["title"]);
                $content = htmlspecialchars($_POST["content"]);
                $id = $row["id"];
                
                $query = "DELETE FROM notes WHERE id = $id";
                if ($connection->query($query) === TRUE) {
                    echo "Note deleted successfully";
                } else {
                    echo "Error updating record: " . $connection->error;
                }
            }
        
    } 
    else {
        echo "Note not found.";
    }

    // Redirect back to the index.php after deletion
    //header("Location: index.php");
    //exit;
}
?>
