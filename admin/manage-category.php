<?php include './partials/menu.php' ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Manage Category</h1>
    <br />
    <?php
    if (isset($_SESSION['flash'])) {
      echo $_SESSION['flash'];
      unset($_SESSION['flash']);
    }
    ?>
    <br />

    <a href="/admin/add-category.php" class="btn-primary">Add Category</a>
    <br />
    <br />
    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
      </tr>

      <?php

      $res = $conn->execute_query("SELECT * FROM tbl_category");
      $count = mysqli_num_rows($res);

      if ($count > 0) {
        $sn = 1;
        while ($row = mysqli_fetch_assoc($res)) : ?>
          <tr>
            <td><?= $sn++ ?>. </td>
            <td><?= $row['title'] ?></td>
            <td><?php
                $image_name = $row['image_name'];
                if ($image_name == "") {
                  echo "<p>No image added</p>";
                } else {
                ?>
                <img src="../images/category/<?= $image_name ?>" alt="<?= $row['title'] ?>" width="120px" />
              <?php
                }
              ?>
            </td>
            <td><?= $row['featured'] ?></td>
            <td><?= $row['active'] ?></td>
            <td>
              <a href="/admin/update-category.php?id=<?= $row['id'] ?>" class="btn-secondary">Update Category</a>
              <a href="/admin/delete-category.php?id=<?= $row['id'] ?>&image_name=<?= $row['image_name'] ?>" class="btn-danger">Delete Category</a>
            </td>
          </tr>
        <?php
        endwhile;
      } else {
        ?>
        <tr>
          <td colspan="6">
            <p class="text-center">No Category Added</p>
          </td>
        </tr>
      <?php
      }
      ?>

    </table>
  </div>
</div>

<?php include './partials/footer.php' ?>