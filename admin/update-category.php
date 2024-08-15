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
          <td>
            <input type="hidden" name="current_image" value="<?= $image_name ?>" />
            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="submit" name="submit" value="Update Category" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      // Get all the vales from our form
      $id = $_POST['id'];
      $title = $_POST['title'];
      $current_image = $_POST['current_image'];
      $featured = $_POST['featured'];
      $active = $_POST['active'];

      // Update new image if selected
      // Check whether the image is selected
      if ($_FILES['image']['name'] != "") {
        // upload the new image
        $image_name = $_FILES['image']['name'];

        // auto rename our images to avoid same name being replaced
        $ext = end(explode('.', $image_name));
        $image_name = "food_category_" . date("YmdHis") . ".$ext";

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/{$image_name}";


        $upload = move_uploaded_file($source_path, $destination_path);


        // if the image is failed to be uploaded, stop the process and redirect with error message
        if (!$upload) {
          $_SESSION['flash'] = "<div class='flash-message error'>Failed to Upload Image</div>";
          header("location: /admin/manage-category.php");
          die();
        }

        // remove the current image
        $remove_path = "../images/category/" . $current_image;
        $remove = unlink($remove_path);

        //check whether the image is removed
        // if failed, then display message and stop the process
        if (!$remove) {
          $_SESSION['flash'] = "<div class='flash-message error'>Failed to remove current image</div>";
          header("location: /admin/manage-category.php");
          die();
        }
      } else {
        $image_name = $current_image;
      }

      // Update the database
      $query = "UPDATE tbl_category SET 
                    title=?, 
                    image_name = ?, 
                    featured = ?, 
                    active = ?
                WHERE id=?";
      $res = $conn->execute_query(
        $query,
        [$title, $image_name, $featured, $active, $id]
      );

      // Redirect to manage category with message
      if ($res) {
        // Category Updated
        $_SESSION['flash'] = "<p class='flash-message success'>Category Updated Successfully</p>";
        header("location: /admin/manage-category.php");
      } else {
        $_SESSION['flash'] = "<p class='flash-message error'>Failed to Update Category</p>";
        header("location: /admin/add-category.php");
      }
    }
    ?>

  </div>
</div>

<?php include './partials/footer.php' ?>