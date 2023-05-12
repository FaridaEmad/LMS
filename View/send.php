<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = '476e0239cea5c0';
    $phpmailer->Password = 'd3f2bdcb6c3042';
    $phpmailer->setFrom ('476e0239cea5c0');
    $phpmailer->addAddress($_POST['email']);
    $phpmailer->isHTML(true);
    $phpmailer->Subject = $_POST['subject'];
    $phpmailer->Body = $_POST['msg'];

    $phpmailer->send();
        echo "<script>
        alert('sent successfully');
        document.location.href = 'send_email_form.php';
            </script>
        ";
}
?>