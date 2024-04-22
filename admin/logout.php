<?php

// Destroy the session
session_destroy();

// Redirect to Login Page
header("location: /admin/login.php");
