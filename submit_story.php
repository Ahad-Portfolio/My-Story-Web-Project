<?php
include 'db.php';

// التحقق من أن الطلب المرسل هو من نوع POST (أي تم إرسال النموذج)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // الحصول على النص المُدخل في الحقل "story" مع إزالة الفراغات من البداية والنهاية
  $story = trim($_POST['story']);

  if (!empty($story)) {

        // تحضير جملة SQL لإدخال القصة في الجدول باستخدام طريقة آمنة (Prepared Statement)
    $stmt = $conn->prepare("INSERT INTO stories (story) VALUES (?)");

    $stmt->bind_param("s", $story);
    
    // تنفيذ الاستعلام
    if ($stmt->execute()) {
      header("Location: index.php");
    } else {
      echo "Error: " . $stmt->error;
    }
    // إغلاق الاستعلام
    $stmt->close();
  } else {
    // إذا كان الحقل فارغًا، عرض رسالة للمستخدم
    echo "Story cannot be empty.";
  }
}
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>