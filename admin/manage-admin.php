<?php include './partials/menu.php' ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Manage Admin</h1>

    <?php if (isset($_SESSION['add'])) : ?>
      <p class="flash-message"><?= $_SESSION['add'] ?></p>
    <?php unset($_SESSION['add']);
    elseif (isset($_SESSION['delete'])) : ?>
      <?= $_SESSION['delete'] ?>
    <?php unset($_SESSION['delete']);
    elseif (isset($_SESSION['update'])) : ?>
      <?= $_SESSION['update'] ?>
    <?php unset($_SESSION['update']);
    elseif (isset($_SESSION['admin-not-found'])) : ?>
      <?= $_SESSION['admin-not-found'] ?>
    <?php unset($_SESSION['admin-not-found']);
    elseif (isset($_SESSION['pwd-not-match'])) : ?>
      <?= $_SESSION['pwd-not-match'] ?>
    <?php unset($_SESSION['pwd-not-match']);
    elseif (isset($_SESSION['change-pwd'])) : ?>
      <?= $_SESSION['change-pwd'] ?>
    <?php unset($_SESSION['change-pwd']);
    else : ?>
      <br />
    <?php endif ?>

    <!-- Button to add Admin -->
    <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br />
    <br />
    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>

      <?php

      $res = $conn->query("SELECT * FROM tbl_admin");
      if ($res) {
        $count = mysqli_num_rows($res);
        $sn = 1;
        // display the list of admins when count returned from query > 0
        if ($count > 0) {
          while ($rows = mysqli_fetch_assoc($res)) {
            // create variables from the associative array
            extract($rows);
      ?>
            <tr>
              <td><?= $sn++ ?>. </td>
              <td><?= $full_name ?></td>
              <td><?= $username ?></td>
              <td>
                <a href="<?= "/admin/update-password.php?id={$id}" ?>" class="btn-primary">Change Password</a>
                <a href="<?= "/admin/update-admin.php?id={$id}" ?>" class="btn-secondary">Update Admin</a>
                <a href="<?= "/admin/delete-admin.php?id={$id}" ?>" class="btn-danger">Delete Admin</a>
              </td>
            <tr>

        <?php
          }
        }
      }
        ?>
    </table>
  </div>
</div>

<?php include './partials/footer.php' ?>