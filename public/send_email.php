<?php

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Le Nom est vide.';
    }

    if (empty($email)) {
        $errors[] = "l'Email est vide.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "l'Email est invalide.";
    }

    if (empty($message)) {
        $errors[] = 'Le Message est vide.';
    }


    if (empty($errors)) {
        $toEmail = 'jordan.jacquot.pro@gmail.com';
        //$headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];

        $headers = "From: contact@jordan-jacquot.fr\r\n";
        $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $body = '<html><body style="">';
        $body .= '<table rules="all" style="border-color: #666;text-align:center;" cellpadding="10">';
        $body .= "<tr style='background: #eee;'><td><strong>Name:</strong></td><td>" . strip_tags($name) . "</td></tr>";
        $body .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
        $body .= "<tr><td><strong>Message:</strong> </td><td>" . nl2br(strip_tags($message)) . "</td></tr>";
        $body .= "</table>";
        $body .= "</body></html>";

        if (mail($toEmail, "Voici un message du Portfolio", $body, $headers)) {
            echo "Email envoyé";
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
            echo $errorMessage; 
        }
    } else {
        echo $errors;
        
    }
}