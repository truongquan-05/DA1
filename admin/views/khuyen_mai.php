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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <?php
    require_once "layouts/libs_css.php";
    ?>

</head>
<style>
    table td,
    table th {
        text-align: center;
        /* Căn giữa theo chiều ngang */
        vertical-align: middle;
        /* Căn giữa theo chiều dọc */
        padding: 8px;
        /* Khoảng cách nội dung với viền ô */

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
                <div class="container-fluid" style="background-color: white; min-height:80vh; padding:35px; border-radius:10px;">

                    <div class="row">
                        <div class="col">

                            <div class="table-responsive">
                                <table style="background-color: white;" class="table table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">ID Voucher</th>
                                            <th scope="col">Tên Voucher</th>
                                            <th scope="col">Hình Ảnh</th>
                                            <th scope="col">Voucher (%)</th>
                                            <th scope="col">Ngày bắt đầu</th>
                                            <th scope="col">Ngày kết thúc</th>
                                            <th scope="col">Mô Tả</th>
                                            <th scope="col">Danh Mục</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($khuyenmai as $khuyenmais): ?>
                                            <tr class="custom-table-row">
                                                <td style="text-align: center; vertical-align: middle;"><?= $khuyenmais['id_voucher'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $khuyenmais['ten_voucher'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><img style="width:70px; height:70px;" src="<?= $khuyenmais['hinh_anh'] ?>" alt="Ảnh sản phẩm"></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $khuyenmais['voucher'] ?> %</td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $khuyenmais['ngay_bat_dau'] ?> </td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $khuyenmais['ngay_ket_thuc'] ?> </td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $khuyenmais['mo_ta'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $khuyenmais['ten_danh_muc'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <a href="index.php?act=updatekm&id=<?= $khuyenmais['id_voucher'] ?>" class="btn custom-button-edit btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                    <a onclick="return confirm('Bạn có muốn xóa?')" href="index.php?act=deletel&id=<?= $khuyenmais['id_voucher'] ?>" class="btn custom-button-delete btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div> <button style="border: none;"><a href="index.php?act=add_khuyenmai"><i class="fas fa-plus"></i>them moi</a></button>
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