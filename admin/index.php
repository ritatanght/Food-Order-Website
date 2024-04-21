<?php include './partials/menu.php' ?>
<!-- Main Content Section Starts -->
<div class="main-content">
  <div class="wrapper">
    <h1>Dashboard</h1>
    <?php if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?>

    <div class="columns">
      <div class="col-4 text-center">
        <p class="value">5</p>
        <p>Categories</p>
      </div>
      <div class="col-4 text-center">
        <p class="value">5</p>
        <p>Categories</p>
      </div>
      <div class="col-4 text-center">
        <p class="value">5</p>
        <p>Categories</p>
      </div>
      <div class="col-4 text-center">
        <p class="value">5</p>
        <p>Categories</p>
      </div>
    </div>

  </div>
</div>
<!-- Main Content Section Ends -->

<?php include './partials/footer.php' ?>