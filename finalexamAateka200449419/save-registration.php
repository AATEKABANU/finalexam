<?php
require_once ('header.php');
require_once ('connect.php');
$password = trim($_POST["password"]);
$confirm_password = trim($_POST["confirm_password"]);
$user_name = trim($_POST["username"]);

    if(!empty($user_name) && !empty($password) && $confirm_password == $password)
    {
        $sql = "INSERT INTO clubperson (username, password) VALUES (:username, :password)";
        if($statement = $db->prepare($sql))
        {
            $statement->bindParam(":username", $param_username, PDO::PARAM_STR);
            $statement->bindParam(":password", $param_password, PDO::PARAM_STR);
            $param_username = $user_name;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if($statement->execute())
            {
              header("location: login.php");
           }
            else
           {
               echo " Please try again some thing is wrong .";
           }
       }
   }

   else {
       echo "<p>  insert login name and password! </p>";
   }
   $statement->closeCursor();
require_once ('footer.php');
?>
