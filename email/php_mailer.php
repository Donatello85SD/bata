<?php

        $Full_name = $_POST['ime'];
        $Email = $_POST['e_mail'];
        $Heading = $_POST['heading'];
        $Comment = $_POST['textarea'];


    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sdonatello85@gmail.com';                 // SMTP username
    $mail->Password = 'scorpion85';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom ( $Email, $Email );   //  Mozemo posle $Email napisati i (, 'Rostilj Bata')
    $mail->addAddress('dachicas1985@gmail.com', 'Daca');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('firma@firma.com', 'Firma');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $Heading;
    $mail->Body = $Comment;
    $mail->AltBody = 'Doslo je do greske u Kontakt formi!';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
//        echo 'Poruka poslata';
        header('Location: ../pages/thank_you.html');
        exit();
    }



?>

