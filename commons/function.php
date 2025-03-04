<?php
require_once "env.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}


function view($view, $data = [], $id = null)
{
    extract($data);
    require_once "views/$view.php";
}

function views($view, $data = [], $subfolder = 'admin/views')
{
    extract($data);
    include_once PATH_ROOT . "{$subfolder}/$view.php";
}

function view_client($view, $data = [], $id = null)
{
    extract($data);
    require_once "templates/glowing-bootstrap-5/$view.php";
}

function gui_email_phpmailer($nguoi_nhan, $tieu_de, $noi_dung, $tu_email = 'quan12345za@gmail.com', $mat_khau = 'sugm dynr cijn ynwe')
{
    $mail = new PHPMailer(true);
    try {
        // Cấu hình máy chủ SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Máy chủ SMTP
        $mail->SMTPAuth = true;
        $mail->Username = $tu_email; // Email của bạn
        $mail->Password = $mat_khau; // Mật khẩu của email
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
  


        // Người gửi và người nhận
        $mail->setFrom($tu_email, 'Trường Quân');
        $mail->addAddress($nguoi_nhan);

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = $tieu_de;
        $mail->Body = $noi_dung;

        $mail->send();
      
    } catch (Exception $e) {
        echo "Gửi email thất bại: {$mail->ErrorInfo}";
    }
}

