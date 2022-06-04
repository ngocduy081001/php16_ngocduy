<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'html/head.php'; ?>
</head>

<body>
    <?php
    $data = array();
    $error = array();
    if (isset($_POST['submit_login'])) {
        $data['username'] = $_POST['username'] ?? '';
        $data['pass'] = $_POST['pass'] ?? '';
        if (empty($data['username']))
            $error['username'] = 'Ban chua nhap ten dang nhap';
        if (empty($data['pass']))
            $error['pass'] = 'Ban chua nhap mat khau';
        else {
            if ($data['username'] == 'admin' && $data['pass'] == 'admin') {
                header("Location: admin.php");
                exit();
            } elseif ($data['username'] == 'member' && $data['pass'] == '123456') {
                header("Location: member.php");
                exit();
            } else {
                echo "<script>alert('tai khoan hoac mat khua khong dung');</script>";
            }
        }
    }
    ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="Post" class="login100-form">
                    <span class="login100-form-title p-b-34">
                        Account Login
                    </span>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                        <input id="first-name" class="input100" type="text" name="username" placeholder="User name">
                        <span class="focus-input100"> </span>
                    </div>
                    <?php echo $error['username'] ?? '' ?>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>

                    </div>
                    <?php echo $error['pass'] ?? '' ?>
                    <div class="container-login100-form-btn">
                        <button name="submit_login" class="login100-form-btn">
                            Sign in
                        </button>
                    </div>
                    <div class="w-full text-center p-t-27 p-b-239">
                        <span class="txt1">
                            Forgot
                        </span>

                        <a href="#" class="txt2">
                            User name / password?
                        </a>
                    </div>

                    <div class="w-full text-center">
                        <a href="#" class="txt3">
                            Sign Up
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <?php include_once 'html/script.php';

    ?>

</body>

</html>