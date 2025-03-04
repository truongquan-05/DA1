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
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>
<style>
    .product-detail {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .product-images img {
        max-width: 100%;
        height: auto;
        margin-bottom: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-info h2 {
        color: #333;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .product-info .label {
        font-weight: bold;
        margin-right: 10px;
        color: #555;
    }

    .product-description {
        margin-top: 30px;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
    }

    .product-comments {
        margin-top: 30px;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
    }

    .binh-luan {
        background-color: white;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .badge {
        font-size: 0.9em;
        padding: 5px 10px;
        margin-right: 5px;
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-detail">
                                <h1 class="mb-4 text-primary">Chi tiết sản phẩm</h1>

                                <div class="row">
                                    <div class="col-md-6 product-images">
                                        <?php foreach ($anhs as $value) : ?>
                                            <img src="image/<?= $value['hinh_anh'] ?>" alt="<?= $data['ten_san_pham'] ?>" class="img-fluid mb-3" width="200px" style="height:200px;">
                                        <?php endforeach ?>
                                    </div>

                                    <div class="col-md-6 product-info">
                                        <h2 class="text-primary"><?= $data['ten_san_pham'] ?></h2>
                                        <p><span class="label">Danh mục:</span> <span class="badge bg-info"><?= $data['ten_danh_muc'] ?></span></p>

                                        <h4 class="mt-4">Các phiên bản:</h4>
                                        <p>
                                            <?php foreach ($all_phien_ban as $key => $phien_ban) : ?>
                                                <?php foreach ($sp_chi_tiet as $key1 => $chi_tiet) : ?>
                                                    <?php foreach ($all_mau_sac as $key2 => $mau_sac) : ?>
                                                        <?php if ($key == $key1 && $key == $key2): ?>
                                                            <span>Ram/Rom: <span class="badge bg-secondary"><?= $phien_ban['phien_ban'] ?></span></span> <br>
                                                            <span>Giá nhập: <strong class="text-danger"><?= number_format($chi_tiet['gia_nhap']) ?> VNĐ</strong> - Giá: <strong class="text-danger"><?= number_format($chi_tiet['gia_ban']) ?> VNĐ</strong>  Số lượng: <span class="badge bg-success"><?= $chi_tiet['so_luong'] ?></span></span>
                                                            <span> Màu sắc: </span><span class="badge bg-primary"> <?= $mau_sac['mau_sac'] ?></span>

                                                        <?php endif; ?>
                                                    <?php endforeach ?>

                                                <?php endforeach ?>
                                                <br> <br>
                                            <?php endforeach ?>

                                        </p>



                                    </div>
                                </div>

                                <div class="product-ratings mt-5">
                                    <h3 class="text-primary">Đánh giá sản phẩm</h3>
                                    <div class="rating-summary mb-4">
                                        <h4>Điểm trung bình: <span class="text-warning"><?= number_format($diem_trung_binh, 1) ?>/5</span></h4>
                                        <p>Tổng số đánh giá: <span class="badge bg-info"><?= $so_luong_danh_gia ?></span></p>
                                        <div class="stars">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <?php if ($i <= round($diem_trung_binh)): ?>
                                                    <i class="ri-star-fill text-warning"></i>
                                                <?php else: ?>
                                                    <i class="ri-star-line text-muted"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($danh_gia)): ?>
                                        <?php foreach ($danh_gia as $dg): ?>
                                            <div class="rating-item mb-3 p-3 bg-light rounded">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0"><?= htmlspecialchars($dg['tens']) ?></h5>
                                                    <div class="stars">
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <?php if ($i <= $dg['diem_danh_gia']): ?>
                                                                <i class="ri-star-fill text-warning"></i>
                                                            <?php else: ?>
                                                                <i class="ri-star-line text-muted"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                                <p class="mt-2"><?= htmlspecialchars($dg['noi_dung']) ?></p>
                                                <small class="text-muted">ID khách hàng: <?= $dg['id_khach_hang'] ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-muted">Chưa có đánh giá nào cho sản phẩm này.</p>
                                    <?php endif; ?>
                                </div>
                                <!-- Phần bình luận -->
                                <div class="product-comments mt-5">
                                    <h3 class="text-primary">Bình luận</h3>
                                    <?php if (!empty($binh_luan)): ?>
                                        <?php foreach ($binh_luan as $bl): ?>
                                            <div class="binh-luan">
                                                <p><strong class="text-primary"><?php echo htmlspecialchars($bl['tens']); ?></strong> đã bình luận:</p>
                                                <p class="text-muted"><?php echo htmlspecialchars($bl['noi_dung']); ?></p>
                                                <small class="text-secondary">ID khách hàng: <?= $bl['id_khach_hang'] ?> - Ngày: <?php echo $bl['ngay_binh_luan']; ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-muted">Chưa có bình luận nào.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php require_once "views/layouts/libs_js.php"; ?>
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

    <!-- JAVASCRIPT -->
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>