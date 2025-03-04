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
    img {
        max-width: 100px;
        border-radius: 8px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    button {
        border: none;
    }


    .form-control,
    .form-control-file,
    .form-control:focus,
    textarea {
        border-radius: 8px;
        transition: box-shadow 0.3s ease;
    }

    .form-control:hover,
    .form-control-file:hover,
    .form-control:focus,
    textarea:focus {
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
        border-color: #007bff;
    }

    .submit-btn {
        padding: 10px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #0056b3;
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
                <div class="container-fluid" style="background-color: white;   border-radius:10px;">

                    <div class="row">
                        <div class="h-100">
                            <div class="container mt-3">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <h1><i class="fas fa-plus"></i> Thêm Dữ Liệu</h1>
                                            <form action="index.php?act=voucher" method="post" enctype="multipart/form-data" class="w-100" onsubmit="return validateForm()">
                                                <div class="form-group mb-3">
                                                    <label for="ten_voucher">Tên:</label>
                                                    <input type="text" class="form-control" name="ten_voucher" id="ten_voucher">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="hinh_anh">Ảnh:</label>
                                                    <input type="file" class="form-control" name="hinh_anh" id="hinh_anh">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="thoi_gian">Thời gian bắt đầu:</label>
                                                    <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="thoi_gian">Thời gian kết thúc:</label>
                                                    <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="voucher">Voucher %:</label>
                                                    <input type="text" class="form-control" name="voucher" id="voucher">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="mo_ta">Mô tả:</label>
                                                    <textarea class="form-control" name="mo_ta" cols="66" rows="8" id="mo_ta"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="id_danh_muc">Danh mục:</label>
                                                    <select class="form-select" name="id_danh_muc" id="id_danh_muc">
                                                        <?php foreach ($danhmuc as $dm) : ?>
                                                            <option value="<?= $dm['id_danh_muc'] ?>"><?= $dm['ten_danh_muc'] ?></option>
                                                        <?php endforeach ?>
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
                var ten_voucher = document.getElementById('ten_voucher').value;
                var voucher = document.getElementById('voucher').value;
                var ngay_ket_thuc = document.getElementById('ngay_ket_thuc').value;
                var ngay_bat_dau = document.getElementById('ngay_bat_dau').value;
                var mo_ta = document.getElementById('mo_ta').value;

                // Check if required fields are filled
                if (ten_voucher == "" || voucher == "" || ngay_ket_thuc == "" || ngay_bat_dau == "") {
                    document.getElementById('error').innerText = "Tất cả các trường là bắt buộc!";
                    return false;
                }
                if (voucher >100) {
                    document.getElementById('error').innerText = "Voucher không được vượt quá 100%";
                    return false;
                }
                
                return true;
            }
        </script>
        <?php
        require_once "layouts/libs_js.php";
        ?>

</body>

</html>