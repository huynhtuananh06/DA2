<?php
// application/config/mail.php
// defined('BASEPATH') OR exit('No direct script access allowed');

// Cấu hình gửi mail - chỉ sửa 1 lần ở đây là xong mãi mãi
$config['mail'] = [
    'protocol'    => 'smtp',
    'smtp_host'   => 'smtp.gmail.com',
    'smtp_user'   => 'luan0392813175@gmail.com',           // ← Gmail của bạn
    'smtp_pass'   => 'rych ahux mivq oicc',            // ← App Password 16 ký tự (có khoảng cách)
    'smtp_port'   => 587,
    'smtp_crypto' => 'tls',
    'mailtype'    => 'html',
    'charset'     => 'utf-8',
    'from_email'  => 'luan0392813175@gmail.com',
    'from_name'   => 'Du Lịch DA2',
];