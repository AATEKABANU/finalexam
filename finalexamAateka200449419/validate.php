<?php
require_once ('connect.php');

    $upassword = trim($_POST['password']);
      $uname = trim($_POST['username']);
$ok = true;
//grab the information from the form and also InvalidArgumentException
if (empty(trim($_POST['username'])))
 {
    echo "<p> please provide your username!</p>";
    $ok = false;
}




if (empty(trim($_POST['password'])))
{
    echo "<p> please provide your password!</p>";
    $ok = false;
}



//validate the credentials
if($ok === true )
{
    $sql = "SELECT id, username, password FROM clubperson WHERE username = :username";
    //prepare
    $statement = $db->prepare($sql);
    //bind
    $statement->bindParam(":username", $uname);
    //execute
    $statement->execute();

    if($statement->rowCount() == 1)
    {
        if($row = $statement->fetch())
        {
          if(password_verify($upassword, $row["password"]))
          {
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("location:view.php");
            }
            else
            {
                echo "<p> Password is not valid!</p>";
            }
        }
        else
         {
            echo "<p> Error accessing your data!</p>";
        }
    }
    else
     {
        echo "<p> can't find the user!</p>";
    }
}
else
 {
    echo "<p>something is wrong! </p>";
}
$statement->closeCursor();
?>
