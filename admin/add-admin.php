<?php include './partials/menu.php' ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>
    <form action="" method="POST">
      <table class="tbl-30">
        <tr>
          <td>Full Name:</td>
          <td><input type="text" name="full_name" placeholder="Enter Your Name" /></td>
        </tr>

        <tr>
          <td>Username:</td>
          <td><input type="text" name="username" placeholder="Username" /></td>
        </tr>


        <tr>
          <td>Password:</td>
          <td><input type="password" name="password" placeholder="Password" /></td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include './partials/footer.php' ?>


<?php
// Process the form and save it in database

// Check whether the form is submitted
if (isset($_POST['submit'])) {

  // get data from form
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']); // password encrytion with MD5


  // execute query and save into database
  $stmt = $conn->prepare('INSERT INTO tbl_admin (full_name, username, password) VALUES (?,?,?)');
  $res = $stmt->execute([$full_name, $username, $password]);

  if ($res) {
    // success
  } else {
    // failure
  }
}
?>