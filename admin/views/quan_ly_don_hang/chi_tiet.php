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
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
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
    body {
        font-family: Arial, sans-serif;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .header .time {
        font-size: 16px;
    }

    .header .icons {
        display: flex;
        align-items: center;
    }

    .header .icons i {
        font-size: 20px;
        margin-left: 15px;
    }

    .store-info {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .store-info img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .product {
        display: flex;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .product img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }

    .product-details {
        flex-grow: 1;
    }

    .product-details .price {
        font-size: 18px;
        font-weight: bold;
        color: #000;
    }

    .product-details .quantity {
        text-align: right;
    }

    .product-details .cancel {
        text-align: right;
        margin-top: 10px;
    }

    .order-summary {
        padding: 10px;
        border-top: 1px solid #ddd;
    }

    .order-summary .total {
        font-size: 18px;
        font-weight: bold;
        color: #000;
    }

    .order-summary .payment-method {
        margin-top: 10px;
    }

    span {
        font-size: 16px;
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
                    <h4>Chi tiết đơn hàng</h4>
                    <div class="container">
                        <?php $tong = 0; ?>
                        <?php
                        $processed_ids = []; // Mảng lưu trữ các id đã được xử lý
                        foreach ($chi_tiet_hoa_don as $value) :
                            if (!in_array($value['id_hoa_don_chi_tiet'], $processed_ids)) {
                                // Xử lý lần đầu tiên của id_hoa_don_chi_tiet
                                $thanh_tien = $value['so_luong_mua'] * $value['don_gia'];
                                $tong = $thanh_tien + $tong;

                                // Thêm id vào mảng đã xử lý
                                $processed_ids[] = $value['id_hoa_don_chi_tiet'];
                        ?>
                                <div class="product">
                                    <img alt="Hình ảnh sản phẩm nồi cơm điện và dao" height="80" src="image/<?= $value['hinh_anh'] ?>" width="80" />
                                    <div class="product-details">
                                        <h4>
                                            <p>
                                                <?= $value['ten_san_pham'] ?>
                                            </p>
                                        </h4>

                                        <div class="price mt-2">
                                            Bộ nhớ: <span class="badge bg-secondary"> <?= $value['phien_ban'] ?></span>
                                            Màu sắc: <span class="badge bg-primary"> <?= $value['mau_sac'] ?></span>
                                        </div>
                                        <div class="price mt-2">
                                            Giá: <?= number_format($value['don_gia'],) ?> VND
                                        </div>
                                        <div class="quantity">
                                            Số lượng: <?= $value['so_luong_mua'] ?>
                                        </div>

                                    </div>
                                </div>
                        <?php
                            }
                        endforeach;
                        ?>
                        <?php

                        $tong_cong = 0;


                        if (isset($hoa_don['khuyen_mai'])) {
                            foreach ($voucher as $k) {
                                if ($hoa_don['khuyen_mai'] == $k['ma_khuyen_mai']) {
                                    foreach ($chi_tiet_hoa_don as $tinh_tien) {
                                        if ($k['id_danh_muc'] == $tinh_tien['id_danh_muc']) {
                                            $tong_cong +=  $k['voucher'] / 100 * ($tinh_tien['so_luong_mua'] * $tinh_tien['don_gia']);
                                        }
                                    }
                                }
                            }
                        }




                        ?>



                        <div class="order-summary">
                            <h4>
                                Thông tin tài khoản đặt hàng
                            </h4>
                            <div class="d-flex justify-content-between">
                                <span>
                                    ID khách hàng
                                </span>
                                <span class="text-danger">
                                    <?= $hoa_don['id_khach_hang'] ?>
                                </span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span>
                                    Tên khách hàng
                                </span>
                                <span>
                                    <?= $hoa_don['tens'] ?>
                                </span>
                            </div>

                        </div>
                        <div class="order-summary">
                            <h4>
                                Thông tin người nhận
                            </h4>
                            <div class="d-flex justify-content-between">
                                <span>
                                    Tên người nhận
                                </span>
                                <span>
                                    <?= $hoa_don['ten_nguoi_nhan'] ?>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>
                                    Email người nhận
                                </span>
                                <span>
                                    <?= $hoa_don['email_nguoi_nhan'] ?>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>
                                    Số điện thoại
                                </span>
                                <span class="text-danger">
                                    <?= $hoa_don['std_nhan_hang'] ?>
                                </span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span>
                                    Địa chỉ nhận hàng
                                </span>
                                <span>
                                    <?= $hoa_don['dia_chi_nhan_hang'] ?>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>
                                    Ghi chú
                                </span>
                                <span style="background-color: yellow;">
                                    <?= $hoa_don['ghi_chu'] ?>
                                </span>
                            </div>


                        </div>


                        <div class="order-summary">
                            <h4>
                                Thanh toán
                            </h4>
                            <div class="d-flex justify-content-between">
                                <span>
                                    Thành tiền
                                </span>
                                <span>

                                    <?= number_format($tong,) ?> VND
                                </span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span>
                                    Voucher
                                </span>
                                <span class="text-danger">
                                    - <?= number_format($tong_cong,) ?> VND
                                </span>
                            </div>

                            <div class="d-flex justify-content-between total mt-2">
                                <span>
                                    Tổng cộng
                                </span>
                                <span>
                                    <?= number_format($tong - $tong_cong,) ?> VND
                                </span>
                            </div>

                        </div>
                    </div>
                    <br>
                    <h4>Cập nhật trạng đơn hàng</h4>

                    <form action="" method="POST">
                        <select class="form-select" aria-label="Default select example" name="trang_thai">
                            <?php foreach ($tr_thai as $key => $value) : ?>
                                <?php if ($data_tt['trang_thai_don_hang'] == 7) : ?>
                                    <option style="color: #d3d7dc;" disabled value="<?= $value['id'] ?>"><?= $value['trang_thai'] ?></option>

                                <?php elseif ($data_tt['trang_thai_don_hang'] == 5) : ?>
                                    <option hidden value=" <?php echo ($data_tt['id']); ?>"> <?php echo ($data_tt['trang_thai']); ?></option>
                                    <option disabled value="<?= $value['id'] ?>"><?= $value['trang_thai'] ?></option>

                                <?php elseif ($data_tt['trang_thai_don_hang'] == 8) : ?>
                                    <option hidden value=" <?php echo ($data_tt['id']); ?>"> <?php echo ($data_tt['trang_thai']); ?></option>
                                    <option disabled value="<?= $value['id'] ?>"><?= $value['trang_thai'] ?></option>

                                <?php elseif ($value['id'] > $data_tt['id'] && $value['id'] != 7 && $value['id'] != 6 && $value['id'] != 8) : ?>
                                    <option hidden value=" <?php echo ($data_tt['id']); ?>"> <?php echo ($data_tt['trang_thai']); ?></option>
                                    <option value="<?= $value['id'] ?>"><?= $value['trang_thai'] ?></option>

                                <?php elseif ($value['id'] == 6 && $data_tt['id'] != 6) : ?>
                                    <option hidden value=" <?php echo ($data_tt['id']); ?>"> <?php echo ($data_tt['trang_thai']); ?></option>
                                    <option value="<?= $value['id'] ?>"><?= $value['trang_thai'] ?></option>

                                <?php elseif ($data_tt['id'] == 1 && $value['id'] != 8) : ?>
                                    <option hidden value=" <?php echo ($data_tt['id']); ?>"> <?php echo ($data_tt['trang_thai']); ?></option>
                                    <option value="<?= $value['id'] ?>"><?= $value['trang_thai'] ?></option>

                                <?php else : ?>
                                    <option style="color: #d3d7dc;" disabled value="<?= $value['id'] ?>"><?= $value['trang_thai'] ?></option>
                                <?php endif; ?>

                                <?php if ($data_tt['id'] == 6) : ?>
                                    <option hidden value=" <?php echo ($data_tt['id']); ?>"> <?php echo ($data_tt['trang_thai']); ?></option>
                                <?php elseif ($data_tt['trang_thai_don_hang'] == 7) : ?>
                                    <option hidden value=" <?php echo ($data_tt['id']); ?>"> <?php echo ($data_tt['trang_thai']); ?></option>


                                <?php endif; ?>

                            <?php endforeach ?>
                        </select> <br>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>

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
    require_once "views/layouts/libs_js.php";
    ?>


</body>

</html>