<?php
include '../connect.php';
$get = $_GET['id'];
$query =  mysqli_query($conn, "SELECT * FROM worker_app WHERE id = '$get'");
$row = mysqli_fetch_array($query);
$full = $row['names'];
$phone = $row['phone'];
$email = $row['email'];
$agakiriro = $row['agakiriro'];
$gender = $row['gender'];
$capital = $row['Capital'];
$idn0 = $row['idn0'];
function randomPassword() {
    $alphabet = '1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$password = randomPassword();
$pass = password_hash($password,PASSWORD_DEFAULT);
$insert = "INSERT INTO worker VALUES(NULL,'$full','$phone','$email','$agakiriro','$capital','$gender',$idn0)";
mysqli_query($conn,$insert) or die(mysqli_error($conn));


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ireragloire2@gmail.com';                     //SMTP username
    $mail->Password   = 'ireragloire2@gmail';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ireragloire2@gmail.com', 'Master');
    $mail->addAddress($email, $full);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Application approved';
    $mail->Body    = "Dear ". $full ." you are approved and your password is " .$password. "<br> You are most Welcome in Agakiriro Smart System";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header("location:approve2.php?id=$full && pass=$password");
?>