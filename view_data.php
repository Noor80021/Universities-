<?php
// استدعاء ملف الاتصال بقاعدة البيانات (db_connect.php)
require_once 'db_connect.php'; 

// 1. استرداد بيانات الجامعات: يستخدم العمود 'name'
$sql_uni = "SELECT id, name FROM universities ORDER BY name ASC";
$result_uni = mysqli_query($conn, $sql_uni);

// 2. استرداد بيانات الكليات: يستخدم العمود 'college_name'
$sql_col = "SELECT id, college_name FROM colleges ORDER BY college_name ASC";
$result_col = mysqli_query($conn, $sql_col);

// 3. استرداد بيانات التخصصات: يستخدم العمود 'major_name'
$sql_maj = "SELECT id, major_name FROM majors ORDER BY major_name ASC";
$result_maj = mysqli_query($conn, $sql_maj);

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>عرض جميع البيانات</title>
<link rel="stylesheet" href="style.css">
<style>
        .data-table { width: 90%; margin: 20px auto; border-collapse: collapse; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        .data-table th { background-color: #007bff; color: white; }
        .data-table tr:nth-child(even) { background-color: #f9f9f9; }
        .data-table tr:hover { background-color: #e9ecef; }
        .section-header { text-align: center; color: #333; margin-top: 40px; margin-bottom: 10px; padding: 10px; background-color: #e9e9e9; }
        .container { padding-bottom: 50px; }
        .navigation { text-align: center; margin: 20px 0; }
        .navigation a { margin: 0 15px; text-decoration: none; color: #007bff; font-weight: bold; }
</style>
</head>
<body>
<div class="container">

<div class="navigation">
<a href="add_university.php">إضافة جامعة</a> |
<a href="add_college.php">إضافة كلية</a> |
<a href="add_major.php">إضافة تخصص</a>
</div>

<h3 class="section-header">🌍 قائمة الجامعات المسجلة</h3>
<?php if (mysqli_num_rows($result_uni) > 0): ?>
<table class="data-table">
<thead>
<tr><th>الرقم (ID)</th><th>اسم الجامعة</th></tr>
</thead>
<tbody>
<?php while($row = mysqli_fetch_assoc($result_uni)): ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
<?php else: ?>
<p style="text-align: center;">لا توجد جامعات مسجلة حاليًا.</p>
<?php endif; ?>

<h3 class="section-header">🏛️ قائمة الكليات المسجلة</h3>
<?php if (mysqli_num_rows($result_col) > 0): ?>
<table class="data-table">
<thead>
<tr><th>الرقم (ID)</th><th>اسم الكلية</th></tr>
</thead>
<tbody>
<?php while($row = mysqli_fetch_assoc($result_col)): ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['college_name']; ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
<?php else: ?>
<p style="text-align: center;">لا توجد كليات مسجلة حاليًا.</p>
<?php endif; ?>

<h3 class="section-header">📚 قائمة التخصصات المسجلة</h3>
<?php if (mysqli_num_rows($result_maj) > 0): ?>
<table class="data-table">
<thead>
<tr><th>الرقم (ID)</th><th>اسم التخصص</th></tr>
</thead>
<tbody>
<?php while($row = mysqli_fetch_assoc($result_maj)): ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['major_name']; ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
<?php else: ?>
<p style="text-align: center;">لا توجد تخصصات مسجلة حاليًا.</p>
<?php endif; ?>

<?php
        // إغلاق الاتصال بقاعدة البيانات
        mysqli_close($conn);
        ?>
</div>
</body>
</html>

