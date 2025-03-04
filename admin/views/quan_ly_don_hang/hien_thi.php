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
    require_once "views/layouts/libs_css.php";
    ?>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<style>
    tr,
    th,
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>



<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
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
                        <nav class="navbar navbar-light ">
                            <div class="container-fluid">
                                <a class="navbar-brand">Đơn hàng</a>
                                <form method="GET" action="index.php" class="d-flex">
                                    <input type="hidden" name="act" value="don_hang">
                                    <input class="form-control me-2" type="search" placeholder="Search mã đơn hàng" aria-label="Search" name="ma_don_hang">
                                    <button class="btn btn-outline-success" style="height: 33.5px;" type="submit">Search</button>
                                </form>

                            </div>
                        </nav>
                        <div class="col">

                            <div class="table-responsive">
                                <table style="background-color: white;" class="table table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Mã đơn hàng</th>
                                            <th scope="col">Ngày đặt</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Hình thức thanh toán</th>
                                            <th scope="col">Trạng thái thanh toán</th>
                                            <th scope="col">Trạng thái đơn hàng</th>
                                            <th scope="col">Aciton</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_hoa_don as $value) : ?>
                                            <?php if (isset($_GET['ma_don_hang']) && $_GET['ma_don_hang'] == $value['ma_don_hang']) : ?>
                                                <tr>
                                                    <td><?= $value['ma_don_hang'] ?></td>
                                                    <td><?= $value['ngay_dat'] ?></td>
                                                    <td><?= number_format($value['tong_tien'], 0, '', '.') ?>
                                                        VND</td>
                                                    <td><?= $value['phuong_thuc_thanh_toan'] ?></td>
                                                    <td>
                                                        <span class="badge bg-info">
                                                            <?php if ($value['trang_thai_don_hang'] >= 3 && $value['trang_thai_don_hang'] < 6) : ?>
                                                                Đã thanh toán
                                                            <?php elseif ($value['trang_thai_don_hang'] >= 6) : ?>
                                                                Đã hoàn tiền
                                                            <?php else: ?>
                                                                Chưa thanh toán
                                                            <?php endif; ?>
                                                        </span>
                                                    </td>

                                                    <td style="color:red">
                                                        <span class="badge bg-secondary">
                                                            <?= $value['trang_thai'] ?>
                                                        </span>
                                                    </td>


                                                    <td><a href="index.php?act=don_hang_chi_tiet&id=<?= $value['id_hoa_don'] ?>">Xem chi tiết</a> |
                                                        <?php if ($value['trang_thai_don_hang'] > 6) : ?>

                                                            <a href="index.php?act=delete_don_hang&id_hoa_don=<?= $value['id_hoa_don'] ?>" onclick="return confirm('Chắc chắn xóa?')"><button style="border:none;">Xoa</button></a>
                                                        <?php else : ?>
                                                            <button style="border:none;" disabled>Xoa</button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php elseif (isset($_GET['ma_don_hang']) && $_GET['ma_don_hang'] != ""): ?>


                                            <?php else : ?>
                                                <tr>
                                                    <td><?= $value['ma_don_hang'] ?></td>
                                                    <td><?= $value['ngay_dat'] ?></td>
                                                    <td><?= number_format($value['tong_tien'], 0, '', '.') ?>
                                                        VND</td>
                                                    <td><?= $value['phuong_thuc_thanh_toan'] ?></td>
                                                    <td>
                                                        <span class="badge bg-info">
                                                            <?php if ($value['trang_thai_don_hang'] >= 3 && $value['trang_thai_don_hang'] < 6) : ?>
                                                                Đã thanh toán
                                                            <?php elseif ($value['trang_thai_don_hang'] >= 6) : ?>
                                                                Đã hoàn tiền
                                                            <?php else: ?>
                                                                Chưa thanh toán
                                                            <?php endif; ?>
                                                        </span>
                                                    </td>

                                                    <td style="color:red">
                                                        <span class="badge bg-secondary">
                                                            <?= $value['trang_thai'] ?>
                                                        </span>
                                                    </td>


                                                    <td><a href="index.php?act=don_hang_chi_tiet&id=<?= $value['id_hoa_don'] ?>">Xem chi tiết</a> |
                                                        <?php if ($value['trang_thai_don_hang'] > 6) : ?>

                                                            <a href="index.php?act=delete_don_hang&id_hoa_don=<?= $value['id_hoa_don'] ?>" onclick="return confirm('Chắc chắn xóa?')"><button style="border:none;">Xoa</button></a>
                                                        <?php else : ?>
                                                            <button style="border:none;" disabled>Xoa</button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>


                                    </tbody>
                                </table>
                            </div>


                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- <footer class="footer">
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
            </footer> -->
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
    require_once "views/layouts/libs_js.php";
    ?>


</body>

</html>