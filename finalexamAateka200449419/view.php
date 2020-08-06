
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COMP1006  Let's Connect </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&family=Quicksand&display=swap" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <link href="main.css" rel="stylesheet">
  </head>
  <?php require_once('auth.php'); ?>
  <?php require_once('header.php'); ?>
  <body class="view">
    <div class="container">
    <?php require_once('navigation.php'); ?>
    <header>
      <h1> Share Your journal </h1>
    </header>
    <main>
        <?php

    try {
      // Connect to our database
        require_once('connect.php');

        $sql="SELECT*FROM book_club_member;";
        //call the prepare method of the PDO object, return PDOStatement Object
        $statement = $db->prepare($sql);


        //execute the query
        $statement->execute();

        //fetchAll method for storing Result
        $records = $statement->fetchAll();

        echo"<table><thead><th>first name</th><th>last name</th><th>profile Image </th><th>short review </th><thead><tbody>";
     foreach ($records as $record) {
         echo "<tr><td>" .$record['first_name'] .

        "</td><td>" . $record['last_name'] .

           "</td><td><img src='images/". $record['profile_image']. "' alt='" .$record['profile_image'] . "'></td><td>"
          . $record['short_book_review'] .



             "<td><a href='delete.php?id=" . $record['user_id'] . "'>Delete</a></td><td><a href='index.php?id=" . $record['user_id'] . "'>Edit</a></td></tr>";
     }
     echo "</tbody></table>";


          //close the db connection
         $statement ->closeCursor();



    } catch (PDOException $e) {
        $error_message = $e->getMessage();

        echo $error_message;

    }

?>
    <a href="index.php" class="error-btn"> Back to Form </a>
    </main>
    <?php require_once('footer.php');?>
    <footer>
      <p> &copy;COMP1006 2020  </p>
    </footer>
   </div><!--end container-->
  </body>
</html>
