<?php 
  require_once("db.php"); 

  $username = "";
  $error = false;
  $message = "";

  if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    if (trim($username) == ""  || trim($password) == "") {
      $error = true;

    } else {
        session_start();
        $sql = "SELECT * from tbl_users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_num_rows($result);

        if ($row==1) {

          while($userData = mysqli_fetch_array($result)) {
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $userData['name'];
            $_SESSION["acc_type"] = $userData['acc_type'];
            header("Location: index.php");
          }

        } else {
          $message = "Wrong username or password!";
          $error = true;
        }

    }
  }

  require_once("templates/header.php"); 
?>

<?=$message?>
<div class="row">
    <div class="col-md-12">
      <h2>Login</h2>
      <form action="login.php" method="post">
        <div class="row">
          <div class="col-sm-2"><p>Username:</p></div>
          <div class="col-sm-10">
            <input class="<?= $error == true && trim($username) == "" ? 'validation' : '' ?>" type="text" name="username" value="<?php echo $username; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2"><p>Password:</p></div>
          <div class="col-sm-10">
            <input class="<?= $error == true && trim($password) == "" ? 'validation' : '' ?>" type="password" name="password" value="">
          </div>
        </div>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>

<?php require_once("templates/footer.php"); ?>