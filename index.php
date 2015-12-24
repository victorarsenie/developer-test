<?php
	require_once("db.php"); 

	$name = "";
	$username = "";
	$error = false;
	$message = "";

	if (isset($_POST['submit'])) {

		$name = mysqli_real_escape_string($connection, $_POST["name"]);
		$username = mysqli_real_escape_string($connection, $_POST["username"]);
    	$password = mysqli_real_escape_string($connection, $_POST["password"]);
    	$confirm_password = mysqli_real_escape_string($connection, $_POST["confirm_password"]);
    	$acc_type = mysqli_real_escape_string($connection, $_POST["acc_type"]);

    	if (trim($name) == "" || trim($username) == ""  || trim($password) == "" || trim($confirm_password) == "" ) {
			$error = true;

		} else if ($_POST["password"] != $_POST["confirm_password"]) {
			$message = "Password does not match!";
			$error = true;
	    } else {
	    	$sql = "INSERT INTO tbl_users (username, password, name, acc_type) VALUES ('$username', '$password', '$name', '$acc_type')";
        	$result = mysqli_query($connection, $sql);
        	$message = "The new account has been added to the database.";
        	$name = "";
			$username = "";
	    }
	}

	require_once("templates/header.php"); 
?>

	<div class="row">
		<div class="col-md-12"><h1>Web Developer Test</h1></div>
	</div>

	<?php if (isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == "admin") { ?>
		<?=$message?>
		<h2>Add a new account</h2>
          <form action="index.php" method="post">
            <div class="row">
              <div class="col-sm-3"><p>Full Name:</p></div>
              <div class="col-sm-9">
                <input class="<?= $error == true && trim($name) == "" ? 'validation' : '' ?>" type="text" name="name" value="<?php echo $name; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3"><p>Username:</p></div>
              <div class="col-sm-9">
                <input class="<?= $error == true && trim($username) == "" ? 'validation' : '' ?>" type="text" name="username" value="<?php echo $username; ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3"><p>Password:</p></div>
              <div class="col-sm-9">
                <input class="<?= $error == true ? 'validation' : '' ?>" type="password" name="password" value="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3"><p>Confirm Password:</p></div>
              <div class="col-sm-9">
                <input class="<?= $error == true ? 'validation' : '' ?>" type="password" name="confirm_password" value="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3"><p>Account Type:</p></div>
              <div class="col-sm-9">
                <select name="acc_type">
                	<option value="user">User</option>
                	<option value="admin">Admin</option>
            	</select>
              </div>
            </div>
            <input type="submit" name="submit" value="Add account">
          </form>
	<?php } ?>

<?php require_once("templates/footer.php"); ?>