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
                <div class="container-fluid" style="background-color: white; min-height:78vh; padding:35px; border-radius:10px;">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <center>
                                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                                <h1> <i class="fas fa-plus"></i>THEM DU LIEU</h1>



                                                <form action="index.php?act=store" method="post" enctype="multipart/form-data" class="add-form" style="background-color: white;">
                                                    <label for="hinh_anhs">Ảnh:</label>
                                                    <input type="file" name="hinh_anhs" id="hinh_anhs" class="form-input">
                                                    <p>Vị trí</p>
                                                    <select name="vi_tri" id="" class="form-input">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>

                                                    <br><br>

                                                    <select name="trang_thai" id="">
                                                        <option value="Hiển thị">Hiển thị</option>
                                                        <option value="Ẩn">Ẩn</option>
                                                    </select>

                                                    <br>
                                                    <br>

                                                    <button type="submit" class="submit-btn">Thêm mới</button>
                                                </form>



                                            </div>
                                        </center>
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