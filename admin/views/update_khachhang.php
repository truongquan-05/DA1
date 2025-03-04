<?php
if (empty($_SESSION['id_admin']) || empty($_SESSION)) {
    header("location: ../index.php?act=login");
    exit();
}

?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Update Customer | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <?php require_once "layouts/libs_css.php"; ?>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #f4f4f4;
    }

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
</style>

<body>
    <div id="layout-wrapper">
        <?php
        require_once "layouts/header.php";
        require_once "layouts/siderbar.php";
        ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid" style="background-color: white; min-height:78vh; border-radius:10px;">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="container mt-5">
                                                <h2 class="text-center">Sửa Thông Tin Khách Hàng</h2>
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Tên:</label>
                                                        <input type="text" class="form-control" name="tens" placeholder="Nhập tên khách hàng" value="<?php echo $data['tens']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ảnh Đại Diện:</label>
                                                        <input type="file" class="form-control" id="anh_dai_dien" name="anh_dai_dien">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Nhập email" value="<?php echo $data['email']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Số Điện Thoại:</label>
                                                        <input type="text" class="form-control" name="so_dien_thoai" placeholder="Nhập số điện thoại" value="<?php echo $data['so_dien_thoai']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ngày Sinh:</label>
                                                        <input type="date" class="form-control" name="ngay_sinh" value="<?php echo $data['ngay_sinh']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa Chỉ:</label>
                                                        <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ" value="<?php echo $data['dia_chi']; ?>" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                                </form>
                                                <p id="error"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <!-- container-fluid -->
                </div>

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