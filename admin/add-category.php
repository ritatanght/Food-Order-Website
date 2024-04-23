<?php include './partials/menu.php' ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Category</h1>

    <?php
    if (isset($_SESSION['flash'])) {
      echo $_SESSION['flash'];
      unset($_SESSION['flash']);
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
      <table class="tbl-30">
        <tr>
          <td>Title: </td>
          <td><input type="text" name="title" placeholder="Category Title" /></td>
        </tr>

        <tr>
          <td>Select Image: </td>
          <td>
            <input type="file" name="image" />
          </td>
        </tr>

        <tr>
          <td>Featured: </td>
          <td>
            <label><input type="radio" name="featured" value="Yes" /> Yes</label>
            <label><input type="radio" name="featured" value="No" checked /> No</label>
          </td>
        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <label><input type="radio" name="active" value="Yes" /> Yes</label>
            <label><input type="radio" name="active" value="No" checked /> No</label>
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Category" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>

  </div>
</div>

<?php include './partials/footer.php';

if (isset($_POST['submit'])) {

  extract($_POST);

  // check whether the image is selected
  var_dump($_FILES['image']);

  if (isset($_FILES['image']['name'])) {
    // we need image name, source path and destination path for upload
    $image_name = $_FILES['image']['name'];
    $source_path = $_FILES['image']['tmp_name'];
    $destination_path = "../images/category/{$image_name}";

    $upload = move_uploaded_file($source_path, $destination_path);

    // if the image is failed to be uploaded, stop the process and redirect with error message
    if (!$upload) {
      $_SESSION['flash'] = "<div class='flash-message error'>Failed to Upload Image</div>";
      header("location: /admin/add-category.php");
      die();
    }
  } else {
    $image_name = "";
  }

  $res = $conn->execute_query(
    "INSERT INTO tbl_category (title, image_name, featured, active) 
      VALUES (?,?,?,?)",
    [$title, $image_name, $featured, $active]
  );

  if ($res) {
    $_SESSION['flash'] = "<p class='flash-message success'>Category Added Successfully</p>";
    header("location: /admin/manage-category.php");
  } else {
    $_SESSION['flash'] = "<p class='flash-message error'>Failed to Add Category</p>";
    header("location: /admin/add-category.php");
  }
}
?>