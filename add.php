<?php 
// ...
  //   require_once' db_connect.ph ';//

$name = $_POST['name'];

// **الخطوة الأهم: تأمين البيانات قبل الاستعلام**
$safe_name = mysqli_real_escape_string($conn, $name); 

// **استخدام القيمة الآمنة في الاستعلام**
$sql = "INSERT INTO universities (name) VALUES ('$safe_name')";

if (mysqli_query($conn, $sql)) 
// ...
?>
