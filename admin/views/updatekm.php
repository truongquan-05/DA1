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
    .add-form {
        max-width: 600px;
        /* Set a maximum width for the form */
        margin: 20px auto;
        /* Center the form on the page */
        padding: 20px;
        /* Add padding inside the form */
        border: 1px solid #ddd;
        /* Add a light gray border */
        border-radius: 8px;
        /* Round the corners of the form */
        background-color: #f9f9f9;
        /* Light background color */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* Add shadow for depth */
    }

    .add-form h1 {
        text-align: center;
        /* Center the heading */
        color: #333;
        /* Darker text color */
    }

    .form-input,
    .form-textarea {
        width: 100%;
        /* Make inputs and textarea full-width */
        padding: 10px;
        /* Add padding inside inputs */
        margin: 10px 0;
        /* Space between inputs */
        border: 1px solid #ccc;
        /* Light border */
        border-radius: 4px;
        /* Rounded corners */
        font-size: 16px;
        /* Font size for inputs */
    }

    .form-input:focus,
    .form-textarea:focus {
        border-color: #007bff;
        /* Change border color on focus */
        outline: none;
        /* Remove default outline */
    }

    .submit-btn {
        display: block;
        /* Center the button */
        width: 100%;
        /* Full width for button */
        padding: 10px;
        /* Add padding */
        background-color: #007bff;
        /* Button color */
        color: white;
        /* Text color */
        border: none;
        /* Remove border */
        border-radius: 4px;
        /* Rounded corners */
        font-size: 16px;
        /* Font size for button */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s;
        /* Smooth transition */
    }

    .submit-btn:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
    }

    .form-group {
        margin-bottom: 0.5rem;
        /* Increased space between form fields */
    }

    .form-container {
        padding: 40px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    #cn_vc {
        position: relative;
        right: 120px;
    }

    .form_ud {
        right: 120px;
        position: relative;
        top: 50px;
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

            <div class="page-content" style="background-color: white; min-height:100vh; padding:35px; border-radius:10px;">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">


                            <div class="container h-100 d-flex justify-content-center align-items-center form_ud">
                                <h1 id="cn_vc"><i class="fas fa-plus"></i> Cập nhật Voucher</h1>
                                <div class="col-12 col-md-8 col-lg-6">
                                    <form action="" method="post" enctype="multipart/form-data" class="p-4 bg-white rounded shadow">
                                        <div class="form-group">
                                            <label for="ten_voucher">Tên Voucher:</label>
                                            <input type="text" class="form-control" name="ten_voucher" id="ten_voucher" value="<?= $khuyenmai['ten_voucher'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Ảnh hiện tại:</label> <br>
                                            <img src="<?= $khuyenmai['hinh_anh'] ?>" width="66" alt="Sản phẩm">
                                            <input type="hidden" name="hinh_anh" value="<?= $khuyenmai['hinh_anh'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="hinh_anh">Ảnh Voucher mới:</label>
                                            <input type="file" class="form-control-file" name="hinh_anh" id="hinh_anh">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="thoi_gian">Thời gian bắt đầu:</label>
                                            <input type="date" class="form-control" name="ngay_bat_dau" id="ngay_bat_dau" value="<?= $khuyenmai['ngay_bat_dau'] ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="thoi_gian">Thời gian kết thúc:</label>
                                            <input type="date" class="form-control" name="ngay_ket_thuc" id="ngay_ket_thuc" value="<?= $khuyenmai['ngay_ket_thuc'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="thoi_gian">Giảm %:</label>
                                            <input type="number" class="form-control" name="voucher" id="thoi_gian" value="<?= $khuyenmai['voucher'] ?>">
                                        </div>



                                        <div class="form-group">
                                            <label for="mo_ta">Mô tả:</label>
                                            <textarea name="mo_ta" class="form-control" cols="30" rows="4" id="mo_ta"><?= $khuyenmai['mo_ta'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_danh_muc">Danh mục:</label>
                                            <select name="id_danh_muc" class="form-control" id="id_danh_muc">
                                                <?php foreach ($danhmuc as $dm) : ?>
                                                    <option value="<?= $dm['id_danh_muc'] ?>" <?= ($dm['id_danh_muc'] == $khuyenmai['id_danh_muc']) ? "selected" : "" ?>>
                                                        <?= $dm['ten_danh_muc'] ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <input type="hidden" name="id_voucher" value="<?= $khuyenmai['id_voucher'] ?>">

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
        require_once "layouts/libs_js.php";
        ?>


</body>

</html>