<?php
require '../config/constants.php';
require 'login-check.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Order Website - Home Page</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
  <!-- Menu Section Starts -->
  <nav class="menu">
    <div class="wrapper">
      <ul>
        <li><a href="/admin/index.php">Home</a></li>
        <li><a href="/admin/manage-admin.php">Admin</a></li>
        <li><a href="/admin/manage-category.php">Category</a></li>
        <li><a href="/admin/manage-food.php">Food</a></li>
        <li><a href="/admin/manage-order.php">Order</a></li>
        <li><a href="/admin/logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- Menu Section Ends -->