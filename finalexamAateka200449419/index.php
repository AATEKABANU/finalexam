<?php require('header.php'); ?>
<body class="add">
<?php require('navigation.php'); ?>
<div class="container inner">
  <?php
  //initialize variables
    $user_id = null;
    $first_name= null;
$last_name= null;
    $profile_image = null;
    $short_book_review= null;
    $sql="";

if(!empty($_GET['id']) && (is_numeric($_GET['id']))) {

      //grab the id from url
      $id = filter_input(INPUT_GET, 'id');
      //connect to the database
      require_once('connect.php');
      //set up our query
      $sql = "SELECT*FROM book_club_member WHERE user_id = :user_id;";
      //prepare our statement
      $statement = $db->prepare($sql);
      //bind
      $statement->bindParam(':user_id', $id);
      //execute
      $statement->execute();
      //use fetchAll to store
      $records = $statement->fetchAll();
      //to loop through, use a foreach loop
      foreach($records as $record) :
      $first_name = $record['first_name'];
      $last_name = $record['last_name'];

      $profile_image = $record['profile_image'];

      $short_book_review= $record['short_book_review'];

      endforeach;

      //close the db connection

      $statement->closeCursor();

    }

    ?>

    <main>

    <h1>Share Your review</h1>

      <form action="process.php" method="post" enctype="multipart/form-data" class="form">

        <!-- add hidden input with user id if editing -->

        <input type="hidden" name="user_id" value="<?php echo $id;?>">

        <div class="form-group">

          <label for="first_name"> First name</label>

          <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $first_name; ?>">

        </div>
        <div class="form-group">

          <label for="last_name"> last name  </label>

          <input type="text" name="last_name" class="form-control" id="last_name" value="<?php echo $last_name; ?>">

        </div>

        <div class="form-group">

          <label for="profile"> Your Profile Image </label>

          <input type="file" name="photo" class="form-control" id="profile" value="<?php echo $profile_image; ?>">

        </div>
        <div class="form-group">

          <label for="short_book_review"> review  </label>

          <input type="text" name="short_book_review" class="form-control" id="short_book_review" value="<?php echo $short_book_review; ?>">

        </div>







        <input type="submit" name="submit" value="Submit" class="btn">

      </form>

    </main>

<?php require('footer.php'); ?>
