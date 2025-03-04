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
                <div class="container-fluid">
                    <div class="container-fluid" style="background-color: white;  padding:35px; border-radius:10px; min-height:78vh;">
                        <div class="row">
                            <div class="col">

                                <div class="h-100">
                                    <div class="row mb-3 pb-1">
                                        <div class="col-12">
                                            <center>
                                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">

                                                    <h2>UPDATE <i class="fas fa-pencil-alt"></i></h2>

                                                    <form action="" method="post" enctype="multipart/form-data" class="update-form" style="background-color: white;">
                                                        <input type="hidden" name="hinh_anhs" value="<?= $banners['hinh_anhs'] ?>">

                                                        <!-- Display current image with some spacing -->
                                                        <div class="form-group">
                                                            <label>Current Image:</label><br>
                                                            <img src="<?= $banners['hinh_anhs'] ?>" width="66" alt="Current Image">
                                                        </div>

                                                        <!-- Image upload field -->
                                                        <div class="form-group">
                                                            <label for="hinh_anhs">Image:</label>
                                                            <input type="file" name="hinh_anhs" id="hinh_anhs">
                                                        </div>

                                                        <!-- Description field -->
                                                        <select name="vi_tri" id="" class="form-input">
                                                            <option hidden value="<?= $banners['vi_tri'] ?>"><?= $banners['vi_tri'] ?></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                        <div class="form-group">
                                                            <select name="trang_thai" id="" class="form-input">
                                                                <option value="<?= $banners['trang_thai'] ?>" hidden><?= $banners['trang_thai'] ?></option>
                                                                <option value="Hiển thị">Hiển thị</option>
                                                                <option value="Ẩn">Ẩn</option>
                                                            </select>
                                                        </div>

                                                        <!-- Hidden field for ID -->
                                                        <input type="hidden" name="id_banner" value="<?= $banners['id_banner'] ?>">

                                                        <button type="submit" class="submit-button">Update</button>
                                                    </form>

                                                    <style>
                                                        .update-form {
                                                            max-width: 400px;
                                                            margin: 0 auto;
                                                            padding: 20px;
                                                            background-color: #f9f9f9;
                                                            border-radius: 8px;
                                                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                                            font-family: Arial, sans-serif;
                                                        }

                                                        .update-form h2 {
                                                            text-align: center;
                                                            color: #333;
                                                            margin-bottom: 20px;
                                                            font-size: 1.5em;
                                                        }

                                                        .form-group {
                                                            margin-bottom: 15px;
                                                        }

                                                        .form-group label {
                                                            display: block;
                                                            font-weight: bold;
                                                            color: #555;
                                                        }

                                                        .form-group input[type="text"],
                                                        .form-group input[type="file"] {
                                                            width: 100%;
                                                            padding: 8px;
                                                            margin-top: 5px;
                                                            border: 1px solid #ccc;
                                                            border-radius: 4px;
                                                            font-size: 1em;
                                                        }

                                                        .submit-button {
                                                            width: 100%;
                                                            padding: 10px;
                                                            background-color: #4CAF50;
                                                            color: white;
                                                            border: none;
                                                            border-radius: 4px;
                                                            font-size: 1em;
                                                            cursor: pointer;
                                                        }

                                                        .submit-button:hover {
                                                            background-color: #45a049;
                                                        }
                                                    </style>

                                                </div>
                                            </center>
                                        </div>


                                    </div>


                                </div> <!-- end col -->
                            </div>

                        </div>
                        <!-- container-fluid -->
                    </div>
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