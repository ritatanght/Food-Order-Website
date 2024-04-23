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

    <a href="/admin/add-category.php" class="btn-primary">Add Category</a>
    <br />
    <br />
    <table class="tbl-full">
      <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>1. </td>
        <td>Vijay Thapa</td>
        <td>vijaythapa</td>
        <td>
          <a href="#" class="btn-secondary"> Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
        </td>
      <tr>
        <td>2. </td>
        <td>Vijay Thapa</td>
        <td>vijaythapa</td>
        <td>
          <a href="#" class="btn-secondary"> Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
        </td>
      <tr>
        <td>3. </td>
        <td>Vijay Thapa</td>
        <td>vijaythapa</td>
        <td>
          <a href="#" class="btn-secondary"> Update Admin</a>
          <a href="#" class="btn-danger">Delete Admin</a>
        </td>
      </tr>
    </table>
  </div>
</div>

<?php include './partials/footer.php' ?>