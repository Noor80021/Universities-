<?php
// 1. بدء الجلسة والتأكد من تسجيل الدخول
session_start();
// يمكنك تفعيل هذا الكود إذا كنت تستخدم نظام تسجيل دخول
/*
if(!isset($_SESSION['USER_ID'])) {
    header('location: login.php');
    exit();
}
*/

// استدعاء ملف الاتصال (يجب أن يكون موجوداً في نفس المجلد)
require_once 'db_connect.php'; 

// تعريف متغيرات الرسائل
$message = '';

// التحقق مما إذا كان النموذج قد أُرسل
if (isset($_POST['save'])) {

    // التحقق مما إذا كان حقل اسم الجامعة ممتلئاً
    if (!empty($_POST['university_name'])) {

        // تنظيف البيانات
        $university_name = mysqli_real_escape_string($conn, $_POST['university_name']);

        // بناء استعلام الإدخال
        // **ملاحظة: تأكد أن 'universities' هو اسم الجدول الصحيح لديك**
        $sql = "INSERT INTO universities (name) VALUES ('$university_name')";

        // تنفيذ الاستعلام
        if (mysqli_query($conn, $sql)) {
            $message = "<div style='color: green; font-weight: bold;'>✅ تم حفظ الجامعة بنجاح!</div>";
        } else {
            $message = "<div style='color: red; font-weight: bold;'>❌ خطأ في الحفظ: " . mysqli_error($conn) . "</div>";
        }

    } else {
        $message = "<div style='color: orange;'>⚠️ يرجى إدخال اسم الجامعة.</div>";
    }
}

// إغلاق الاتصال بقاعدة البيانات في نهاية الملف (أمر اختياري لكنه جيد)
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>إضافة جامعة</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
<h3>Add University</h3>

<?php echo $message; ?>

<form method="POST" action="add_university.php">
<input type="text" name="university_name" placeholder="University Name" required>

<button type="submit" name="save">Save</button>
</form>
</div>
</body>
</html>

