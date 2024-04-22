<?php

// if no user is logged in
if (!isset($_SESSION['user'])) {

  $_SESSION['no-login'] = "<div class='flash-message error text-center'>Please login to access Admin Panel</div>";

  header("location: /admin/login.php");
}
