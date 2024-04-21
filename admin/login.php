<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Food Order System</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

  <div class="text-center login">
    <h1>Login</h1>

    <?php if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?>

    <form action="" method="POST">
      <label>
        Username:
        <input type="text" name="username" placeholder="Enter Username" />
      </label>
      <label>

        Password:
        <input type="password" name="password" placeholder="Enter Password" />
      </label>

      <input type="submit" name="submit" value="Login" class="btn-primary" />
    </form>
    <br />
    <p class="text-center">Creatd By - <a href="https://github.com/ritatanght">Rita Tang</a></p>
  </div>

</body>

</html>

<?php
include("../config/constants.php");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $res = $conn->execute_query("
  SELECT * FROM tbl_admin  
  WHERE username = ? AND password = ?
  ", [$username, $password]);

  $count = mysqli_num_rows($res);

  if ($count == 1) {
    $_SESSION['login'] = "<p class='flash-message success'>Login Successful</p>";
    header("location: /admin/");
  } else {
    $_SESSION['login'] = "<p class='flash-message error'>User or Password did not match</p>";
    header("location: /admin/login.php");
  }
}

?>