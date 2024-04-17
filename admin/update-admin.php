<?php include './partials/menu.php' ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Admin</h1>

    <?php
    // Get the ID of selected Admin
    $id = $_GET['id'];

    // Create SQL query to get the details
    $res = $conn->execute_query("SELECT * FROM tbl_admin WHERE id=?", [$id]);


    if ($res) {
      $count = mysqli_num_rows($res);
      if ($count == 1) {

        $rows = mysqli_fetch_assoc($res);

        extract($rows);
      } else {
        header("location: /admin/manage-admin.php");
      }
    }
    ?>

    <form action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>Full Name:</td>
          <td><input type="text" name="full_name" value="<?= $full_name ?>" /></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td><input type="text" name="username" value="<?= $username ?>" /></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Update Admin" class="btn-secondary" />
          </td>

        </tr>
      </table>
    </form>
  </div>
</div>


<?php include './partials/footer.php' ?>