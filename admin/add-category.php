<?php include './partials/menu.php' ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Category</h1>

    <form action="" method="post">
      <table class="tbl-30">
        <tr>
          <td>Title: </td>
          <td><input type="text" name="title" placeholder="Category Title" /></td>
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
            <input type="submit" name="submit" value="Add Category" class="btn-secondary" />
          </td>
        </tr>
      </table>
    </form>

  </div>
</div>

<?php include './partials/footer.php' ?>