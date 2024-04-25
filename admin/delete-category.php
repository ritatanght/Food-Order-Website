<?php

include "../config/constants.php";

extract($_GET);
if (isset($id) && isset($image_name)) {
  // remove the image file
  if ($image_name != "") {
    $path = "../images/category/{$image_name}";
    $remove = unlink($path);

    // failed to remove image, add message and stop the process
    if (!$remove) {
      $_SESSION['flash'] = "<div class='flash-message error'>Failed to remove image</div>";
      header("location: /admin/manage-category.php");
      die();
    }
  }
  // delete data from database
  $res = $conn->execute_query("DELETE FROM tbl_category WHERE id=?", [$id]);
  // redirect to manage category page with message
  if ($res) {
    $_SESSION['flash'] = "<div class='flash-message success'>Category Deleted Successfully</div>";
  } else {
    $_SESSION['flash'] = "<div class='flash-message error'>Failed to Delete Category</div>";
  }
  header("location: /admin/manage-category.php");
} else {
  header("location: /admin/manage-category.php");
}
