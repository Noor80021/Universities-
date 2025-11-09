<<?php
// بيانات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";       // اسم المستخدم الافتراضي
$password = "";           // كلمة المرور الافتراضية (فارغة)
$dbname = "university_db"; // **اسم قاعدة البيانات الصحيح حسب phpMyAdmin**

// إنشاء الاتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);

// التحقق من الاتصال
if (!$conn) {
    // إيقاف البرنامج مع رسالة خطأ واضحة
    die("Connection failed: " . mysqli_connect_error());
}
?>

