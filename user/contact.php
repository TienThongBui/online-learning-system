<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../PHPMailer/src/Exception.php";
require_once "../PHPMailer/src/PHPMailer.php";
require_once "../PHPMailer/src/SMTP.php";


if (isset($_POST['submit'])) {
    $mail = new PHPMailer(true);
    $alert = '';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tienthongbui2001@gmail.com';
        $mail->Password = 'xphpqendpsrcjuwg';
        // $mail->SMTPSecure = 'tls';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;


        $mail->setFrom($_POST['email']);
        $mail->addAddress('tienthongbui2001@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Message Received From E-ELO Contact: ' . $subject;
        $mail->Body = "Name: $name <br> Phone: $contact <br> Email: $email <br> Subject: $subject <br> Message: $message";

        $mail->send();
        $alert = "<div class='alert-success'>
                        <span>
                            Message sent! Thank you for contact us!
                        </span>
                    </div>";
    } catch (Exception $e) {
        $alert = "<div class='alert-danger'>
                        <span>
                            $e -> getMessage()
                        </span>
                    </div>";
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact us</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/contactV1.css">
</head>

<body>

    <?php
        include_once '../partitials/header.php';
    ?>

    <div class="main">
        <div class="container w-50">
            <div class="row mt-2">
                <div class="row text-center my-4">
                    <div class="contact-header">
                        <h1 class="text-white">Contact Us</h1>
                        <h5 class="text-white">Please fill all the form</h5>
                    </div>
                </div>
                <div class="contact-content">
                    <form action="" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter your name:..." />
                                    <label for="floatingInput">Name</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Enter your email:..." />
                                    <label for="floatingInput">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="contact" id="contact" class="form-control"
                                        placeholder="Enter your phone number:..." />
                                    <label for="floatingInput">Contact</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" name="subject" id="subject" class="form-control"
                                        placeholder="Enter your subject:..." />
                                    <label for="floatingInput">Subject</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <textarea name="message" id="message" class="form-control"
                                        style="height: 10em;"></textarea>
                                    <label for="floatingInput">Message</label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <button type="submit" name="submit" id="submit" class="btn btn-outline-success">Send
                                    mail</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="row justify-content-center text-center my-5">
                <div class="col-md-6">
                    <?php echo $alert ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>