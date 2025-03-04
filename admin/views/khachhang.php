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
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<style>
    table td,
    table th {
        text-align: center;
        vertical-align: middle;
        padding: 8px;
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
                <div class="container-fluid" style="background-color: white; padding:35px; border-radius:10px; min-height:78vh;">
                    <nav class="navbar navbar-light ">
                        <div class="container-fluid">
                            <a class="navbar-brand">Khách hàng</a>
                            <form method="GET" action="index.php" class="d-flex">
                                <input type="hidden" name="act" value="khachhang">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="ten_khach_hang">
                                <button class="btn btn-outline-success" style="height: 33.5px;" type="submit">Search</button>
                            </form>

                        </div>
                    </nav>
                    <div class="row">

                        <div class="col">


                            <div class="table-responsive">
                                <table style="background-color: white;" class="table table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">AVT</th>
                                            <th scope="col">Tên khách hàng</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Ngày sinh</th>
                                            <th scope="col">Ngày đăng ký</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Vai trò</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $value) : ?>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;"><?= $value['id_khach_hang'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><img style="width:60px; height:60px;  border-radius: 50%;" src="<?= $value['anh_dai_dien'] ?>" alt=""></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $value['tens'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $value['email'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $value['so_dien_thoai'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $value['ngay_sinh'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $value['ngay_dang_ky'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"><?= $value['dia_chi'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;"> <span class="badge bg-primary"><?= $value['vai_tro'] ?></span></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <a style="display: inline-block;" href="index.php?act=update_khachhang&id=<?= $value['id_khach_hang'] ?>" class="btn-action" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                                    <a style="display: inline-block;" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="index.php?act=dl_khachhang&id=<?= $value['id_khach_hang'] ?>" class="btn-action delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>
                                </table>
                            </div>


                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <br>
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