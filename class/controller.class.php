<?php
    class Connect extends PDO{
        public function __construct(){
            parent::__construct("mysql:host=localhost;dbname=note_taking_db",'root','',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
}
    class Controller {
        //check if user logged in
        function checkUserStatus($g_id, $sess){
            $db = new Connect;
            $user = $db -> prepare("SELECT g_id,f_name from users WHERE g_id = :g_id AND session = :session");
            $user -> execute([
                ':g_id'     => intval($g_id),
                ':session'  => $sess,
               
            ]);
            $userInfo = $user -> fetch(PDO::FETCH_ASSOC);
            if($userInfo){
                $f_name = $userInfo['f_name'];
                echo "Welcome " , $f_name;
            }
           
            if(!$userInfo["g_id"] || !$f_name){
                return FALSE;
            }else{
                return TRUE;
            }
        }


        //generate password and session ID
        function generateCode($length){
            $char = "poikMNBV09856";
            $code = "";
            $clean = strlen($char) - 1;
            while (strlen($code) < $length){
                $code .= $char[mt_rand(0, $clean)];
            }
            return $code;
        }

        //insert data
    function insertData($data){
        $db = new Connect;

        //return $data["email"];
        $checkUser = $db -> prepare("SELECT * FROM users WHERE email = :email");
        $checkUser -> execute(['email' => $data["email"]]);
        $info = $checkUser->fetch(PDO::FETCH_ASSOC);
       // echo $info ["g_id"];
        if(!$info["g_id"]){
            $session = $this -> generateCode(10);
            $insertUser = $db -> prepare("INSERT INTO users (email, f_name, l_name, password, session) VALUES
            (:email, :f_name, :l_name, :password, :session)");
            $insertUser -> execute ([
                ':email' => $data ["email"],
                ':f_name' => $data ["givenName"],
                ':l_name' => $data ["familyName"],
                ':password' => $this->generateCode(5),
                ':session' => $session
                
            ]);

            if($insertUser){ //set cookies
                setcookie("g_id", $db->lastInsertId(), time()+60*60*24*30, "/", NULL);
                setcookie("sess",$session, time()+60*60*24*30, "/", NULL);
                header('Location: index.php');
                exit();
            }else{
                return "Error while inserting user details";
            }
        }else{  //set cookies 
            setcookie("g_id",$info["g_id"],time()+60*60*24*30,"/",NULL);
            setcookie("sess",$info["session"],time()+60*60*24*30,"/",NULL);
            header('Location: index.php');
            exit();
        }

        
    } 
}

?>