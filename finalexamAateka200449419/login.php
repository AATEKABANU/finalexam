<?php
require('header.php');
?>
<main class="container login">

    <h1> Log In! </h1>
    <form action="validate.php" method="post">
        <fieldset class="form-group">
			<label for="username" >User Name:</label>
			<input name="username" type="text" class="form-control" id="username" required>
		</fieldset>
		<fieldset class="form-group">
			<label for="password">Password:</label>
			<input name="password" required type="password"  id="password" class="form-control" >
		</fieldset>
        <input type="submit" value="Log In!" name="submit" class="btn btn-success">
    </form>
    <p> click on register to sign up</p>
    <a href="register.php"> Register </a>
</main>
<?php require("footer.php") ?>
