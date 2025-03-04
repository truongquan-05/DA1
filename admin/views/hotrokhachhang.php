<?php
if (empty($_SESSION['id_admin']) || empty($_SESSION)) {
    header("location: ../index.php?act=login");
    exit();
}

?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "layouts/libs_css.php";
    ?>

</head>
<style>
    .list {
        width: 80%;
        background-color: var(--vz-footer-bg);
        border-radius: 10px 10px 0 0px;
        height: 500px;
        overflow-y: scroll;

    }

    .list::-webkit-scrollbar {
        width: 5px;

        /* Độ rộng của thanh cuộn */
    }


    .list::-webkit-scrollbar-thumb {
        background-color: rgb(163, 163, 163);
        border-radius: 10px;
        /* Màu thanh cuộn */
    }

    .list::-webkit-scrollbar-thumb:hover {
        background: #888;
    }

    .khach_hang img {
        margin: 10px;
        width: 70px;
        height: 70px;
        border-radius: 50%;
    }

    .khach_hang {
        display: flex;
        height: auto;
        border-radius: 5px;
        margin-top: 10px;

    }

    .noi_dung {
        display: flex;
        justify-content: space-between;
        width: 80%;
        margin-left: 15px;
    }

 

    .admin div h5 {
        display: flex;
        justify-content: end;
    }

    .admin {
        width: 90%;

    }

    .admin div p {
        float: right;
        max-width: 70%;
    }


    .box {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form {
        width: 80%;
        position: relative;
    }


    #tin_nhan {
        width: 100%;
        padding: 10px;
        padding-right: 80px;

    }

    #tin_nhan::-webkit-scrollbar {
        width: 0px;

        /* Độ rộng của thanh cuộn */
    }




    .form form button {

        transition: .5s ease;
        position: absolute;
        top: 10px;
        right: 100px;
    }

    .form form button:active {
        transform: scale(0.95);
    }

    textarea {

        border-radius: 0 0 8px 8px;
        /* Bo góc tròn */
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
        /* Đổ bóng nhẹ */
        outline: none;
        /* Bỏ viền mặc định khi focus */
        transition: box-shadow 0.3s ease-in-out;
        /* Hiệu ứng khi focus */
        border: 1px solid #D9D9D9;
    }

    textarea:focus {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        /* Tăng đổ bóng khi focus */
        border-color: #aaa;
        /* Màu viền khi focus */
    }

    .kt_chat {
        position: absolute;
        right: 10px;
        top: -56px;
    }
</style>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->

        <?php
        require_once "layouts/header.php";
        require_once "layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h3 class="fs-16 mb-1">
                                                    <a href="index.php?act=lienhe"><i class="fa-solid fa-chevron-left"></i> Hỗ trợ khách hàng</a>

                                                </h3>

                                            </div>

                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>



                                <div class="box">
                                    <div class="list">



                                        <!-- khach hang hoi -->
                                        <?php foreach ($du_lieu as $value) : ?>
                                            <?php //id sau nay lay bang SESSION
                                            if ($value['id_nguoi_gui'] == $id) : ?>
                                                <div class="khach_hang">
                                                    <img src="../admin/<?= $value['anh_dai_dien'] ?>" alt="">
                                                    <div class="noi_dung">
                                                        <div style=" width: 735px;">
                                                            <h5><?= $value['tens'] ?></h5>
                                                            <p><?= $value['noi_dung'] ?></p>
                                                        </div>
                                                        <span><?= $value['thoi_gian'] ?></span>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <!-- admin tra loi -->

                                            <?php if ($value['id_nguoi_gui'] == $_SESSION['id_admin']) : ?>
                                                <div class="khach_hang item_admin">

                                                    <div class="admin">
                                                        <div>
                                                            <h5><?= $value['tens'] ?></h5>
                                                            <p style="margin-right: 30px;"><?= $value['noi_dung'] ?>
                                                            </p>
                                                        </div>

                                                    </div>
                                                    <img src="../admin/<?= $value['anh_dai_dien'] ?>" alt="">
                                                </div>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="form">
                                        <form action="" method="POST">
                                            <textarea name="noi_dung" id="tin_nhan" rows="2" placeholder="Nhập tin nhắn"></textarea>
                                            <button type="submit" class="btn btn-primary">Gửi</button>
                                        </form>



                                    </div>


                                    <form action="" method="POST" style=" width: 80%; position:relative;">
                                        <input type="text" name="trang_thai" value="Đã hỗ trợ" style="display:none">

                                        <button type="submit" class="btn btn-warning kt_chat">Kết thúc</button>
                                    </form>

                                </div>



                            </div>


                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->

    <?php
    require_once "layouts/libs_js.php";
    ?>

</body>
<script>

</script>

</html>