<?php include './partials/menu.php' ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Category</h1>

    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $res = $conn->execute_query("SELECT * FROM tbl_category WHERE id=?", [$id]);

      $count = mysqli_num_rows($res);
      if ($count == 1) {
        // populate the form
        $row = mysqli_fetch_assoc($res);
        extract($row);
      } else {
        $_SESSION['flash'] = "<div class='flash-message error'>Category not Found</div>";
        header("location: /admin/manage-category.php");
      }
    } else {
      // redirect to manage category when id is not set
      header("location: /admin/manage-category.php");
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>Title: </td>
          <td><input type="text" name="title" value="<?= $title ?>" /></td>
        </tr>

        <tr>
          <td>Current Image: </td>
          <td><?php if ($image_name != "") {
              ?>
              <img src="../images/category/<?= $image_name ?>" width="150px">
            <?php
              } else {
                echo "<div class='error'>Image Not Added</div>";
              }
            ?>
          </td>
        </tr>

        <tr>
          <td>New Image: </td>
          <td>
            <input type="file" name="image" />
          </td>
        </tr>

        <tr>
          <td>Featured: </td>
          <td>
            <label><input type="radio" name="featured" value="Yes" <?= $featured == 'Yes' ? 'checked' : '' ?> /> Yes</label>
            <label><input type="radio" name="featured" value="No" <?= $featured == 'No' ? 'checked' : '' ?> /> No</label>
          </td>
        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <label><input type="radio" name="active" value="Yes" <?= $active == 'Yes' ? 'checked' : '' ?> /> Yes</label>
            <label><input type="radio" name="active" value="No" <?= $active == 'No' ? 'checked' : '' ?> /> No</label>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Update Category" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>

  </div>
</div>

<?php include './partials/footer.php' ?>