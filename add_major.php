<?php
// 1. بدء الجلسة
session_start();
require_once 'db_connect.php'; 

$message = ''; 

// 2. التحقق مما إذا كان النموذج قد أُرسل (زر 'save_major' مضغوط)
if (isset($_POST['save_major'])) {

    // التحقق من أن حقل اسم التخصص غير فارغ
    if (!empty($_POST['major_name'])) {

        // تنظيف البيانات
        $major_name = mysqli_real_escape_string($conn, $_POST['major_name']);

        // بناء استعلام الإدخال: (نستخدم 'major_name' كاسم للعمود لتفادي مشاكل التسمية)
        $sql = "INSERT INTO majors (major_name) VALUES ('$major_name')";

        // تنفيذ الاستعلام
        if (mysqli_query($conn, $sql)) {
            $message = "<div style='color: green; text-align: center; padding: 10px; background-color: #d4edda; border: 1px solid #c3e6cb;'>✅ تم حفظ التخصص بنجاح!</div>";
        } else {
            // عرض رسالة الخطأ
            $message = "<div style='color: red; text-align: center; padding: 10px; background-color: #f8d7da; border: 1px solid #f5c6cb;'>❌ خطأ في الحفظ: " . mysqli_error($conn) . "</div>";
        }

    } else {
        $message = "<div style='color: orange; text-align: center; padding: 10px; background-color: #fff3cd; border: 1px solid #ffeeba;'>⚠️ يرجى إدخال اسم التخصص.</div>";
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إضافة تخصص</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
<h3>إضافة تخصص</h3>

<?php echo $message; ?>

<form method="POST" action="add_major.php">
<input type="text" name="major_name" placeholder="اسم التخصص" required>

<button type="submit" name="save_major">حفظ التخصص</button>
</form>
</div>
</body>
</html>

