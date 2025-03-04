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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
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
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }

    .table-responsive {
        margin: 30px 0;
    }

    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 15px;
        background: #299be4;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn {
        color: #566787;
        float: right;
        font-size: 13px;
        background: #fff;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn:hover,
    .table-title .btn:focus {
        color: #566787;
        background: #f2f2f2;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.settings {
        color: #2196F3;
    }

    table.table td a.delete {
        color: #F44336;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }

    .text-success {
        color: #10c469;
    }

    .text-info {
        color: #62c9e8;
    }

    .text-warning {
        color: #FFC107;
    }

    .text-danger {
        color: #ff5b5b;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

    #editor {
        height: 400px;
    }

    textarea {
        height: 70px;
        width: 100%;
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
                <div class="container-fluid" style="background-color: white;  padding:35px; border-radius:10px; min-height:78vh;">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <h2>Thêm sản phẩm</h2> <br>
                                <form class="row g-3" method="POST" enctype="multipart/form-data" onsubmit="submitForm(event)" id="myForm">
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nhập tên sản phẩm..." name="ten_san_pham">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Danh mục</label>
                                        <select id="inputState" class="form-select" name="id_danh_muc">
                                            <option hidden value="0">Chọn danh mục</option>
                                            <?php foreach ($danh_muc as $dm) : ?>
                                                <option value="<?= $dm['id_danh_muc'] ?>"><?= $dm['ten_danh_muc'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="floatingTextarea2">Mô tả ngắn</label>
                                        <textarea class="form-control" placeholder="Nhập mô tả ngắn..." id="floatingTextarea2" name="mo_ta_ngan" style="height: 100px"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label for="floatingTextarea2">Mô tả dài</label>
                                        <div id="editor"></div>
                                    </div>

                                    <div class="col-md-12"">
                                        <label for=" imageUpload" class="form-label">Chọn nhiều ảnh:</label>
                                        <input type="file" class="form-control" id="imageUpload" name="hinh_anh[]" accept="image/*" multiple>
                                    </div>




                                    <div class="container mt-4">
                                        <h2 class="text-center">Quản lý biến thể</h2>
                                        <button id="add_so_luong" type="button" class="btn btn-success mb-3">Thêm dòng mới</button>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; width:unset;">Ram/Rom</th>
                                                    <th style="text-align: center;">Màu sắc</th>
                                                    <th style="text-align: center;">Giá nhập</th>
                                                    <th style="text-align: center;">Giá bán</th>
                                                    <th style="text-align: center;">Số lượng</th>
                                                    <th style="text-align: center;">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Các dòng sản phẩm sẽ được thêm vào đây -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Template row -->
                                    <template id="template-row">
                                        <tr>
                                            <td><input type="text" class="form-control" placeholder="Ram/Rom" name="phien_ban[]"></td>
                                            <td><input type="text" class="form-control" placeholder="Màu sắc" name="mau_sac[]"></td>
                                            <td><input type="number" class="form-control" placeholder="Giá nhập" name="gia_nhap[]" min="0"></td>
                                            <td><input type="number" class="form-control" placeholder="Giá bán" name="gia_ban[]" min="0"></td>
                                            <td><input type="number" class="form-control" placeholder="Số lượng" name="so_luong[]" min="0"></td>
                                            <td style="text-align: center;">
                                                <button type="button" class="btn btn-danger btn-delete-row" style="background-color:red">Xóa</button>
                                            </td>
                                        </tr>
                                    </template>


                                    <div class="col-12">
                                        <h5 style="color:red;" id="er_san_pham"></h5>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>

                                </form>


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
    <script>
        // Khởi tạo Quill
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        function submitForm(event) {
            event.preventDefault(); // Ngăn chặn form gửi tự động

            // Lấy nội dung từ Quill dưới dạng HTML
            const content = quill.root.innerHTML;

            // Tạo một trường ẩn và thêm vào form
            const input = document.createElement('textarea');
            input.setAttribute('name', 'mo_ta_dai'); // Tên này sẽ gửi đi với dữ liệu POST
            input.style.display = 'none';
            input.value = content;
            input.placeholder = "Nhập mô tả dài..."

            // Thêm trường ẩn vào form và gửi form
            const form = document.getElementById('myForm');
            form.append(input);
            form.submit();
        }

    

        document.addEventListener("DOMContentLoaded", () => {
            const btnAddRow = document.getElementById("add_so_luong");
            const tableBody = document.querySelector("tbody");
            const template = document.getElementById("template-row");

            // Thêm dòng mới
            btnAddRow.addEventListener("click", () => {
                const newRow = template.content.cloneNode(true); // Sao chép nội dung từ template
                tableBody.appendChild(newRow); // Thêm dòng mới vào tbody
            });

            // Xóa dòng
            tableBody.addEventListener("click", (e) => {
                if (e.target.classList.contains("btn-delete-row")) {
                    const row = e.target.closest("tr");
                    row.remove(); // Xóa dòng chứa nút "Xóa"
                }
            });
        });
    </script>

    <?php
    require_once "views/layouts/libs_js.php";
    ?>


</body>

</html>