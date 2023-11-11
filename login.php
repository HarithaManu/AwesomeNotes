 <?php
   /* require 'db.php';
    $error = "";
    $success = "";
    if(isset($_POST['uname'])){
        $username=$_POST['uname'];
        $password=$_POST['pwd'];
        $sql="select * from login where uname='".$username."' AND pwd='".$password."' limit 1";
        
        $result=mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){
            $error = "";
            $success = "Welcome";

           header("location: home.html");
        }
        else{
            $error = "Invalid Password!!!";
            $success = "";
            exit();
        }
    }
*/
?>



<!DOCTYPE html>
<html>
<head>
<script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Login Page</title>
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
       .overlay {
            width: 400px;
            height: auto;
            position : absolute;
            top: 25%;
            left : 49%;
            transform: translate(-52%, -52%);
        } 

        /* Add CSS for the login form */
        .login-container {
            background-color: rgba(255, 255, 255, 0.7);
            width: 300px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20%;
        }
    

        /* Add CSS for form elements */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-bottom: 1px solid #333;
            background: transparent;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <div class = "overlay">
      <!-- <img src = "AN_logo.png" alt = "app logo"> -->

    </div>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
   <div class="login-container">
        <h1>Awesome Notes</h1>
      
        <form method="post">
           <!-- <input type="text" name="uname" placeholder="Username" required>
            <input type="password" name="pwd" placeholder="Password" required> -->
            <input type="submit" value="Sign-in with google">
        </form>
        


    </div> 
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
</body>
</html>

