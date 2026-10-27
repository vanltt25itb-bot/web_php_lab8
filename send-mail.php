<?php
// 1. Nhúng các namespaces và file cốt lõi của PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Khởi tạo đối tượng PHPMailer
$mail = new PHPMailer(true);

try {
    // 2. Cấu hình Server gửi mail (SMTP Server của Google)
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                 // Bật chế độ debug để xem lỗi chi tiết nếu có (khi chạy xong có thể đổi thành 0)
    $mail->isSMTP();                                       // Sử dụng giao thức SMTP
    $mail->Host       = 'smtp.gmail.com';                  // SMTP Server của Gmail
    $mail->SMTPAuth   = true;                              // Bật xác thực SMTP
    
    // ĐIỀN THÔNG TIN TÀI KHOẢN CỦA BẠN VÀO ĐÂY:
    $mail->Username   = 'Thaovan090107@gmail.com';         // SMTP Username: Địa chỉ Gmail của bạn
    $mail->Password   = 'qogk dnoy agur mtzm';             // SMTP Password: Mật khẩu ứng dụng 16 ký tự bạn vừa tạo
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Mã hóa bảo mật (TLS)
    $mail->Port       = 587;                               // Cổng kết nối (Port 587 cho TLS)

    // 3. Cấu hình người gửi và người nhận
    // Email gửi đi (phải trùng với tài khoản Gmail ở Username phía trên)
    $mail->setFrom('Thaovan090107@gmail.com', 'website bán tài khoản học tiếng anh ');
    
    // Email nhận thông tin (Ví dụ: Email của bạn hoặc email của khách hàng mua đơn hàng)
    $mail->addAddress('lethithaovan09012007@gmail.com', 'Thảo Vân'); 

    // 4. Nội dung Email
    $mail->isHTML(true);                                   // Định dạng nội dung gửi đi là HTML
    $mail->Subject = 'Thông báo đơn hàng mới từ Website!';
    $mail->Body    = '<b>Chào bạn,</b> đây là email thông báo có khách hàng vừa đặt đơn hàng mới trên hệ thống.';
    $mail->AltBody = 'Chào bạn, đây là email thông báo có khách hàng vừa đặt đơn hàng mới trên hệ thống.';

    // 5. Tiến hành gửi mail
    $mail->send();
    echo 'Đã gửi email thành công!';
} catch (Exception $e) {
    echo "Gửi mail thất bại. Lỗi chi tiết: {$mail->ErrorInfo}";
}
?>