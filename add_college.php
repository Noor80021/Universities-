<?php
// 1. بدء الجلسة
session_start();
require_once 'db_connect.php'; 

$message = ''; 

// 2. التحقق مما إذا كان النموذج قد أُرسل (زر 'save_college' مضغوط)
if (isset($_POST['save_college'])) {

    // التحقق من أن حقل اسم الكلية غير فارغ
    if (!empty($_POST['college_name'])) {

        // تنظيف البيانات
        $college_name = mysqli_real_escape_string($conn, $_POST['college_name']);

        // بناء استعلام الإدخال: (نستخدم 'college_name' كاسم للعمود لتفادي الخطأ السابق)
        $sql = "INSERT INTO colleges (college_name) VALUES ('$college_name')";

        // تنفيذ الاستعلام
        if (mysqli_query($conn, $sql)) {
            $message = "<div style='color: green; text-align: center; padding: 10px; background-color: #d4edda; border: 1px solid #c3e6cb;'>✅ تم حفظ الكلية بنجاح!</div>";
        } else {
            // عرض رسالة الخطأ لتسهيل تتبع المشاكل
            $message = "<div style='color: red; text-align: center; padding: 10px; background-color: #f8d7da; border: 1px solid #f5c6cb;'>❌ خطأ في الحفظ: " . mysqli_error($conn) . "</div>";
        }

    } else {
        $message = "<div style='color: orange; text-align: center; padding: 10px; background-color: #fff3cd; border: 1px solid #ffeeba;'>⚠️ يرجى إدخال اسم الكلية.</div>";
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إضافة كلية</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
<h3>إضافة كلية</h3>

<?php echo $message; ?>

<form method="POST" action="add_college.php">
<input type="text" name="college_name" placeholder="اسم الكلية" required>

<button type="submit" name="save_college">حفظ الكلية</button>
</form>
</div>
</body>
</html>

