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
    require_once "views/layouts/libs_css.php";
    ?>

</head>


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
                <div class="container-fluid" style="background-color: white;  padding:35px; border-radius:10px; min-height:78vh;">

                    <div class="row">
                        <div class="h-100">
                            <div class="container mt-5">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <h1 style="position: relative; right:50px;"><i class="fas fa-plus"></i> Thêm trạng thái</h1>
                                            <form action="index.php?act=store_tt" method="post" class="w-100" onsubmit="return validateForm()">
                                                <div class="form-group mb-3">
                                                    <label for="trang_thai">Trang thái đơn hàng</label>
                                                    <input type="text" class="form-control" name="trang_thai" id="trang_thai">
                                                </div>

                                                </select>
                                        </div>
                                        <div class="form-group mb-3 text-center">
                                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                                        </div>
                                        <p id="error" class="text-danger text-center"></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end col -->

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
    <script>
        function validateForm() {
            var trang_thai = document.getElementById('trang_thai').value;

            // Check if required fields are filled
            if (trang_thai == "") {
                document.getElementById('error').innerText = "Tất cả các trường là bắt buộc!";
                return false;
            }

            // If all checks pass, return true to submit the form
            return true;
        }
    </script>
    <?php
    require_once "views/layouts/libs_js.php";

    ?>


</body>

</html>