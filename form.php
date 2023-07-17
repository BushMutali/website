<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

if (isset($_POST["submit"])) {
    $useremail = $_POST["email"];
    $message = $_POST["message"];

    function invalidEmail($useremail){
        if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    if (invalidEmail($useremail) !== false) {
        echo '<script>
        alert("Please enter a valid email address!");
   </script>';
    }

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';
    
    

    $mail->addAddress('bushmutally@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Contacting from your website';
    $mail->Body = ($message);
    $mail->setFrom($useremail);


   $mail->send();

   echo '<script>
        alert("Message sent successfully!");
   </script>';


}
else{
    header("location: index.php#contact");
    exit();
}