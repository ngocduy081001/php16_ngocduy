
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php include_once './html/head.php' ?>
</head>

<body class="stretched overlay-menu">

    <div id="wrapper" class="clearfix bg-light">
        <header id="header" class="full-header dark">
            <?php include_once './html/header.php' ?>
        </header>
        <div class="container-fluid">
            <div class="row">
                <!-- Content -->

                <section id="content" class="bg-light">
                    <div class="content-wrap pt-lg-0 pt-xl-0 pb-0">
                        <div class="container-fluid clearfix">
                            <div class="heading-block border-bottom-0 center pt-4 mb-3">
                                <h3>Tin tức</h3>

                            </div>
                            <!-- Posts -->
                            <div class="row grid-container infinity-wrapper clearfix  align-align-items-start">

                                <?php require_once './new.php';
                                ?>
                            </div>
                        </div>

                    </div>
                </section> <!-- #content end -->

                <section class="right-side mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="box mt-4">
                                    <h3 class="mb-1">Giá vàng</h3>
                                    <div class="card card-body" id="box-gold">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <!-- <?php require_once './box-gold.php';
                                                $_SESSION['notice-gold'] ?>  -->

                                    </div>

                                </div>
                                <div class="box mt-4">
                                    <h3 class="mb-1">Giá coin</h3>
                                    <div class="card card-body" id="box-coin">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                        <!-- <?php require_once './box-coin.php' ?>  -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <footer>
            <?php include_once './html/footer.php' ?>
        </footer>
    </div>

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up rounded-circle"></div>
    <?php include_once './html/script.php' ?>
    <script>
        $('#box-coin').load("./box-coin.php");
        $('#box-gold').load("./box-gold.php");
    </script>

</body>

</html>