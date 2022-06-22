<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>PHP FILE - ADD</title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cancel-button').click(function() {
                window.location = 'index.php';
            });
        });
    </script>
</head>

<body>
    <?php
    require_once 'functions.php';
    require_once 'functionsUpload.php';

    $flag       = false;
    $error = array();
    $data       = array();

    // Check file size


    if (isset($_POST['title']) && isset($_POST['description'])) {
        $data['title']            = $_POST['title'];
        $data['description']    = $_POST['description'];

        if (checkEmpty($data['title']))             $error['title'] = '<p class="error">Dữ liệu không được rỗng</p>';
        if (checkLength($data['title'], 5, 100))  $error['title'] .= '<p class="error">Tiêu đề dài từ 5 đến 100 ký tự</p>';


        if (checkEmpty($data['description']))            $error['description'] = '<p class="error">Dữ liệu không được rỗng</p>';
        if (checkLength($data['description'], 10, 5000)) $error['description'] .= '<p class="error">Nội dung dài từ 10 đến 5000 ký tự</p>';

        $configs    = parse_ini_file('config.ini');
        $fileUpload = $_FILES['file-img'];
        $flagSize         = checkSize($fileUpload['size'], $configs['min_size'], $configs['max_size']);
        $flagExtension     = checkExtension($fileUpload['name'], explode('|', $configs['extension']));

        if (!$flagSize) {
            $error['' . $configs['img'] . ''] =  'dung luong tap tin khong hop le';
        }
        if (!$flagExtension) {
            $error['img'] = 'phan mo rong khong hop le';
        }


        // A-Z, a-z, 0-9: AzG09
        if (empty($error)) {
            $data['img']    = randomStringFileImg($fileUpload['name'], 7);

            $dataFile    = $data['title'] . '||' . $data['description']  . '||' . $data['img'];
            $name = randomString(5);
            $fileName    = './' . $configs['file'] . '/' . $name . '.txt';
            move_uploaded_file($fileUpload['tmp_name'], './img/' . $data['img']);

            if (file_put_contents($fileName, $dataFile)) {
                $flag            = true;
            }
        }
    }
    ?>
    <div id="wrapper">
        <div class="title">PHP FILE - ADD</div>
        <div id="form">
            <form action="#" method="post" name="add-form" enctype="multipart/form-data">
                <div class="row">
                    <p>Title</p>
                    <input type="text" name="title" value="<?php echo $data['title'] ?? ''; ?>">
                    <?php echo $error['title'] ?? ''; ?>
                </div>

                <div class="row">
                    <p>Description</p>
                    <textarea name="description" rows="5" cols="100"><?php $data['description'] ?? ''; ?></textarea>
                    <?php echo $error['description'] ?? '' ?>
                </div>
                <input type="file" name="file-img">
                <div class="row">
                    <input type="submit" value="Save" name="submit">
                    <input type="button" value="Cancel" name="cancel" id="cancel-button">
                </div>

                <?php
                if ($flag == true) echo '<div class="row"><p>Dữ liệu đã được ghi thành công!</p></div>';
                ?>

            </form>
        </div>

    </div>
</body>

</html>