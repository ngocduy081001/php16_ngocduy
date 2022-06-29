<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
include_once "./validate.php";


$mail = new PHPMailer(true);
$result = [];
$errors = '';
$email = file_get_contents('./data/configEmail.json');
$email_json = json_decode($email, true);
function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if (!empty($_POST)) {
    $source = $_POST;
    $validate = new Validate($source);

    $validate->addRule('name', 'string', 5, 100, false)
        ->addRule('email', 'email', 5, 500)
        ->addRule('message', 'string', 5, 500)
        ->addRule('title', 'string', 5, 500);

    $validate->run();
    $errors = $validate->showErrors();
    $result = $validate->getResult();
    if (empty($errors)) {
        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();

            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $email_json[0]['user'];
            $mail->Password   = $email_json[1]['pass'];
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($result['email'], $result['name']);
            $mail->addAddress('ngocduy081001@gmail.com', 'Ngọc Duy');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject =  $result['title'];
            $mail->Body    = $result['message'];

            $mail->send();
            alert('send mail succcsess');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else alert('Email send failed');
}

?>


<!DOCTYPE html>
<html dir="ltr" lang="vi">

<head>
    <?php require_once "./html/head.php" ?>
</head>

<body class="stretched">

    <div id="wrapper" class="clearfix">
        <?php require_once "./html/header.php" ?>

        <?php require_once "./html/page-title.php" ?>
        <!-- Content
		============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="row align-items-stretch col-mb-50 mb-0">
                        <!-- Contact Form -->
                        <div class="col-lg-6">
                            <div class="fancy-title title-border">
                                <h3>Gửi tin nhắn cho chúng tôi</h3>
                            </div>
                            <div class="">
                                <?= $errors ?>
                                <form class="mb-0" action="" method="post">
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="name">Họ tên <small>*</small></label>
                                            <input type="text" id="name" name="name" value="<?= @$result['name'] ?>" class="sm-form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="email">Email <small>*</small></label>
                                            <input type="text" id="email" name="email" value="<?= @$result['email'] ?>" class="email sm-form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="title">Tiêu đề <small>*</small></label>
                                            <input type="text" id="title" name="title" value="<?= @$result['title'] ?>" class="sm-form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="message">Nội dung <small>*</small></label>
                                            <textarea type="text" class="sm-form-control" id="message" name="message" rows="6" cols="30"><?= @$result['message'] ?></textarea>
                                        </div>
                                        <div class="col-12 form-group">
                                            <button type="submit" tabindex="5" class="button button-3d m-0">Gửi tin
                                                nhắn</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- Contact Form End -->

                        <!-- Google Map -->

                        <div class="col-lg-6 min-vh-50">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.36020553829!2d106.73649971462324!3d10.860183792264735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527d5640014e7%3A0x3bb323b29d50dca9!2zWmVuZFZOIC0gxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6pu!5e0!3m2!1svi!2s!4v1656164032569!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div><!-- Google Map End -->
                    </div>

                    <!-- Contact Info -->
                    <div class="row col-mb-50">
                        <div class="col-sm-6 col-lg-4">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-map-marker2"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Địa chỉ<span class="subtitle">Tầng 5, Tòa nhà Songdo, 62A Phạm Ngọc Thạch,
                                            Phường 6, Quận 3, HCM</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-phone3"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Hotline<span class="subtitle">090 5744 470 <br /> 0383 308 983</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-email"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Email<span class="subtitle">training@zend.vn</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info End -->

                </div>
            </div>
        </section>
        <!-- #content end -->

        <?php require_once "./html/footer.php" ?>
    </div>

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <?php require_once "./html/scrpipt.php" ?>
</body>

</html>