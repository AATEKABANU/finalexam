<?php require_once('header.php'); ?>
<?php require('navigation.php'); ?>
<body>
  <main class="container">
    <h1>Sign Up</h1>
        <p>Please all the fields to create an account.</p>
        <form action="save-registration.php" method="post">
            <div class="form-group">
                <label  for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" >
            </div>
            <div >
                <label  for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div >
                <label  for="confirmpassword">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirmpassword" class="form-control">
            </div>
            <div>
                <input type="submit"  value="Submit">
            </div>

            <p>You already have an account? <a href="login.php">Please Login Here</a>.</p>
        </form>
    </main>
<?php require_once('footer.php'); ?>
