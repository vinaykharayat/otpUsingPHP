<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './bean/user.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["name"]) && isset($_POST["email"])) {
    define("OTP", mt_rand(100000, 999999));
    define("mOTP", mt_rand(100000, 999999));

    $newUser = new user($_POST["name"], $_POST["email"]);
    sendSuccessEmail($newUser);
}

function sendSuccessEmail($newUser) {

    require_once 'PHPMailer/PHPMailer.php';
    require_once 'PHPMailer/SMTP.php';
    require_once 'PHPMailer/Exception.php';
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "shastrishraddha1001@gmail.com"; //Mail will be sent from this email
    $mail->Password = "Jungle@mogli10";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";
    //Email settings
    $mail->isHTML(true);
    $mail->setFrom($_POST['email'], $_POST['name']);

    $mail->addAddress($_POST['email']);    //Mail will be sent to this email
    $mail->Subject = $_POST["subject"];
    $mail->Body = "Registration successful. Welcome " . $_POST['name'] . ". Your OTP is " . OTP . ".\nUsername: ". $_POST['name'] .".\n Visit this link to confirm http://192.168.2.200/RegistrationForm/register.php";
    if ($mail->send()) {
        confirmAccount();
        verifyPhoneNumer();
    } else {
        print_r("Error" . $mail->ErrorInfo);
    }
}

function confirmAccount() {
    print_r("<h1>Check your inbox for OTP. If you can't see please check spam folder also!</h1>");
    print_r("<p>OTP has been sent to Email: ".$_POST['email']." and Phone: ".$_POST['phone']."</p>");
    print_r("<p>Username is sent to your email with OTP</p>");
    print_r("<form action='successful.php' method='post'>");
    print_r("<input placeholder='Enter username' name='username'><br>");

    print_r("<input placeholder='Enter 6 digit otp' name='otp'><br>");
    print_r("<input type='submit' value='submit'><br>");
    print_r("<input type='hidden' name='conOtp' value='" . OTP . "' >");
    print_r("<input type='hidden' name='mailUser' value='" . $_POST['name'] . "' >");
    print_r("</form>");
}

function verifyPhoneNumer() {

    $fields = array(
        "sender_id" => "CHKSMS",
        "message" => "2",
        "variables_values" => "OTP for ".$_POST['name']." ".OTP,
        "route" => "s",
        "numbers" => $_POST["phone"],
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
            "authorization: tEPtZANxzhBY8fC62LADehwaaB3cyeIunTqzsAxbNzbHFWhZzZimcWRZDDPV",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

}
