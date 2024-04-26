<?php include './partials/menu.php' ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Category</h1>

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
          <td><input type="text" name="title" value="" /></td>
        </tr>

        <tr>
          <td>Current Image: </td>
          <td>
            Image will be displayed here
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
            <label><input type="radio" name="featured" value="Yes" /> Yes</label>
            <label><input type="radio" name="featured" value="No" /> No</label>
          </td>
        </tr>

        <tr>
          <td>Active: </td>
          <td>
            <label><input type="radio" name="active" value="Yes" /> Yes</label>
            <label><input type="radio" name="active" value="No" /> No</label>
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