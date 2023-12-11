<?php
    require_once('config.php');
    //require_once('core/controller.class.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="514667753745-t966cgb2kcib0ifik0f1ldkkuahi4869.apps.googleusercontent.com">
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
        .g-signin {
            background-color: rgba(255, 255, 255, 0.7);
            width: 300px;
            margin: auto;
            
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
    <div class="login-container">
    <h1>Awesome Notes</h1>
      
        <form method="post">
            <input type="text" name="uname" placeholder="Username" required>
            <input type="password" name="pwd" placeholder="Password" required>
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" onclick="window.location = '<?php echo $login_url; ?>' ">Sign-in with Google</button>
            
            
        </form>

    </div>
    <script>


   
    
    




</script>
</body>
</html>

