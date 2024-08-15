<?php
// Linux command to start server: sudo service mysql start

// Start session
session_start();

// Database Connection
$conn = new mysqli('localhost', 'root', 'root', 'food-order');
