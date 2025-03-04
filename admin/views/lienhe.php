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

    }

    .list a {

        text-decoration: none;
        /* Xóa gạch chân */
        color: inherit;
        /* Sử dụng màu sắc của thẻ cha */
        background: none;
        /* Xóa background nếu có */
        padding: 0;
        /* Xóa padding */
        margin: 0;
        /* Xóa margin */
        border: none;
        /* Xóa viền nếu có */
    }



    .khach_hang img {
        margin: 10px;
        width: 70px;
        height: 70px;
        border-radius: 50%;
    }

    .khach_hang {
        /* border: 1px solid black; */
        display: flex;
        border-radius: 10px;
        margin-top: 10px;
        /* box-shadow: 0px 0px 3px #D2D2D8; */
        cursor: pointer;
        transition: .2s ease;
        background-color: #f7f7f7;

    }

    .khach_hang:hover {
        box-shadow: 0px 0px 5px #D2D2D8;
    }

    .noi_dung {
        display: flex;
        justify-content: space-between;
        width: 86%;
        /* border: 1px solid black; */
        margin-left: 15px;
    }

    .noi_dung div p {
        margin-left: 10px;
        width: 100%;
        /* border: 1px solid black; */
        height: 40px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* Giới hạn số dòng là 2 */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
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
                <div class="container-fluid" style="background-color: white;  padding:35px; border-radius:10px; min-height:78vh;">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h3 class="fs-16 mb-1">
                                                    Danh sách cần hỗ trợ
                                                </h3>

                                            </div>

                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="pagination justify-content-center">
                                    <div class="list">
                                        <!-- tin nhan khach hang -->

                                        <?php
                                        $check = [];
                                        ?>

                                        <?php foreach ($du_lieu as $index => $data) : ?>
                                            <?php
                                            // Kiểm tra xem ID người gửi đã có trong mảng $check hay chưa
                                            if (!in_array($data['id_nguoi_gui'], $check)) :
                                            ?>
                                                <!-- id nguoi gui khac id admin -->
                                                <a href="index.php?act=ho_tro_khach_hang&id=<?= $data['id_nguoi_gui'] ?>">
                                                    <div class="khach_hang">
                                                        <img src="../admin/<?=$data['anh_dai_dien']?>" alt="">
                                                        <div class="noi_dung">
                                                            <div>
                                                                <h5><?= $data['tens'] ?></h5>
                                                                <!--  -->
                                                                <?php foreach ($nguoi_nt as $value) : ?>
                                                                    <?php if (
                                                                        $value['id_nguoi_gui'] == $data['id_nguoi_gui'] && $value['id_nguoi_nhan'] == $data['id_nguoi_nhan'] ||
                                                                        $value['id_nguoi_gui'] == $data['id_nguoi_nhan'] && $value['id_nguoi_nhan'] == $data['id_nguoi_gui']
                                                                    ) : ?>
                                                                        <p><span><?= $value['noi_dung'] ?></span> </p>

                                                                    <?php endif ?>
                                                                <?php endforeach; ?>


                                                            </div>

                                                            <?php foreach ($nguoi_nt as $value) : ?>
                                                                <?php if ( ($data['id_nguoi_gui']== $value['id_nguoi_gui'] && $value['trang_thai'] != "") || ($data['id_nguoi_gui']== $value['id_nguoi_nhan'] && $value['trang_thai'] != "")) : ?>
                                                                    <span style="color: red;">
                                                                        <h5><?= $value['trang_thai']  ?></h5>
                                                                    </span>
                                                                <?php elseif(($data['id_nguoi_gui']== $value['id_nguoi_gui'] && $value['trang_thai'] == "") || ($data['id_nguoi_gui']== $value['id_nguoi_nhan'] && $value['trang_thai'] == "")) : ?>
                                                                    <span> <?= $data['thoi_gian'] ?></span>
                                                                <?php
                                                                endif ?>
                                                            <?php endforeach; ?>

                                                        </div>
                                                    </div>
                                                </a>
                                            <?php
                                                $check[] = $data['id_nguoi_gui']; // Thêm ID người gửi vào mảng $check
                                            endif;
                                            ?>
                                        <?php endforeach; ?>

                                    </div>

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

</html>