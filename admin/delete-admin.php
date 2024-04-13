<?php
require "../config/constants.php";

// Get the ID of the Admin to be deleted
$id = $_GET['id'];

// Create SQL query to delete Admin
$stmt = $conn->prepare("DELETE FROM tbl_admin WHERE id=?");
$res = $stmt->execute([$id]);

// Redirect to manage-admin page with message (success/error)
if ($res) {
  $_SESSION['delete'] = "<p class='flash-message success'>Admin Deleted Successfully</p>";
  header("location: /admin/manage-admin.php");
} else {
  $_SESSION['delete'] = "<p class='flash-message error'>Failed to Delete Admin. Try Again Later.</p>";
  header("location: /admin/manage-admin.php");
}
