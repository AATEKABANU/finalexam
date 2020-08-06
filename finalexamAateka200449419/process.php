
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COMP1006 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&family=Quicksand&display=swap" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <link href="main.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <?php require_once('navigation.php'); ?>
    <header>
      <h1> Share book review</h1>
    </header>
    <main>
        <?php

//create variables to store form data
$first_name= filter_input(INPUT_POST, 'first_name');
$last_name= filter_input(INPUT_POST, 'last_name');
/*image*/
$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_size = $_FILES['photo']['size'];
$short_book_review = filter_input(INPUT_POST, 'short_book_review');


$id = null;
//$id = filter_input(INPUT_POST,'user_id');
//set up a flag variable

$ok = true;

//define image constants

    define('UPLOADPATH', 'images/');

    define('MAXFILESIZE', 32786); //32 KB



//validate
// first name and last name not empty


if (empty($first_name)) {
    echo "<p class='error'>Please provide first name! </p>";
    $ok = false;
}
if (empty($last_name)) {
    echo "<p class='error'>Please enter last_name </p>";
    $ok = false;
}

if (empty($short_book_review)) {
    echo "<p class='error'>Please enter  review! </p>";
    $ok = false;
}


if(empty($photo))
{
if ((($photo_type !== 'image/gif') || ($photo_type !== 'image/jpeg') || ($photo_type !== 'image/jpg') || ($photo_type !== 'image/png')) && ($photo_size > 0) && ($photo_size <= MAXFILESIZE)) {
//making sure no upload errors
  $ok = false;
  echo "Please submit a photo that is a jpg, png or gif and less than 32kb";
}
else {
echo "something is wrong";
}
}



//if form validates, try to connect to database and add info

if ($ok === true)
{
    try {
      $target=UPLOADPATH . $photo;
      move_uploaded_file($_FILES['profileimage']['tmp_name'],$target);

        if(!empty($id))
        {
          $sql = "UPDATE book_club_member SET $first_name = :first_name,$last_name = :last_name,$photo= :profile_image, $short_book_review= :short_book_review  WHERE $user_id = :user_id;";
        }

        else
        {
        // set up SQL command to insert data into table
        $sql = "INSERT INTO book_club_member (first_name,last_name,profile_image,short_book_review) VALUES (:first_name,:last_name,:profile_image, :short_book_review);";
        }
        // Connect to our database
        require_once('connect.php');
        //call the prepare method of the PDO object, return PDOStatement Object
        $statement = $db->prepare($sql);// fill in the correct method
        //bind parameters
        $statement->bindParam(':first_name', $first_name);
        $statement->bindParam(':last_name', $last_name);

        $statement->bindParam(':profile_image', $photo);
        $statement->bindParam(':short_book_review', $short_book_review);




        if(!empty($id))
        {
          $statement->bindParam('user_id',$id);
        }
        //execute the query
        $statement->execute();

        // show message
        echo "<p> your review's added! Thanks for sharing! </p>";

        //close the db connection
       $statement ->closeCursor();


    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //show error message to user
        echo "<p> Sorry! We weren't able to process your submission at this time. We've alerted our admins and will let you know when things are fixed! </p> ";
        echo $error_message;

    }
}
?>
    <a href="index.php" class="error-btn"> Back to Form </a>
    </main>
    <footer>
      <p> &copy; 2020 final exam</p>
    </footer>
   </div><!--end container-->
  </body>
</html>
