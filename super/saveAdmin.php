<?php
require '../server/mailer.php';
require '../server/codeGenerator.php';
include '../connect.php';
if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $query=mysqli_query($conn,"SELECT * FROM admin WHERE fullnames='$name'");
    $fetch=mysqli_fetch_array($query);
    if ($fetch) {
    # code...
    }
    else{
        $insert="INSERT INTO admin VALUES(NULL,'$name','$email','$phone')";
        $query=mysqli_query($conn,$insert)or die(mysqli_error());
        $generatedCode = codeGenerator();
        $subject  = 'AMS Admin Application';
        $message = 'Hello ' . $name . ' Welcome to Agakiriro Smart System , we are pleased to announce to you that you have been successfully admitted as a Admin in Agakiriro Smart System ' . ' <h2 style="color:#dc3545">' . $generatedCode . ' </h2> ' . ' Is your account verification code' . '<br>' . 'You will use it to access your account :' . 'Do not share any information provided with anyone and if you have any issues with your account do not hesitate to contact us.';
        $sendMail = mailing($email, $message, $subject);
        }
    }
    header("location:approve.php?email=$email && pass=$generatedCode");
?>