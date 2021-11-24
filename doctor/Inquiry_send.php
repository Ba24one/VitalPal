<?php

    $name = $_POST['name'];
    $user_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $email_from = 'community.vitalpal@gmail.com';

    $email_subject = 'New Form Submission';

    $email_body = "User Name: $name.\n".
                    "User Email: $user_email.\n".
                        "Subject: $subject.\n".
                            "User Message: $message .\n";

    $to = 'community.vitalpal@gmail.com';

    // $to = $visitor_email;

    $headers = "From: $email_from \r\n";

    $headers .= "Reply-To $user_email \r\n";

    mail($to, $email_subject, $email_body, $headers);

    header("Location: Inquiry.php");

?>