<?php session_start(); if(!isset($_SESSION['user'])){ header("Location:index.php"); } ?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title><link rel="stylesheet" href="style.css"></head>
<body>

<div class="box">
<h2>Dashboard</h2>

<a href="add_university.php">➕ Add University</a><br>
<a href="add_college.php">➕ Add College</a><br>
<a href="add_major.php">➕ Add Major</a><br>
<a href="view_data.php">📋 View All Data</a><br><br>

<a style="color:red" href="logout.php">Logout</a>
</div>
</body>
</html>
