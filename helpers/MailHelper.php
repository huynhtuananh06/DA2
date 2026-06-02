<?php
// application/helpers/MailHelper.php
// === BẢO VỆ CODEIGNITER ===
// defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper
{
    private static $config = null;

    // Load config 1 lần duy nhất
    public static function init()
    {
        if (self::$config === null) {
            require_once  __DIR__ . '/../configs/mail.php';
            self::$config = $config['mail'];
        }
    }

    // Gửi mail chỉ 1 dòng là xong!
    public static function send($to_email, $subject, $message, $attachment = null)
    {
        self::init();

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = self::$config['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = self::$config['smtp_user'];
            $mail->Password   = self::$config['smtp_pass'];
            $mail->SMTPSecure = self::$config['smtp_crypto'];
            $mail->Port       = self::$config['smtp_port'];
            $mail->CharSet    = self::$config['charset'];

            $mail->setFrom(self::$config['from_email'], self::$config['from_name']);
            $mail->addAddress($to_email);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Đính kèm file nếu có (ví dụ: vé PDF)
            if ($attachment && file_exists($attachment)) {
                $mail->addAttachment($attachment);
            }

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log('MAIL ERROR: ' . $mail->ErrorInfo);
            return false;
        }
        
    }
}