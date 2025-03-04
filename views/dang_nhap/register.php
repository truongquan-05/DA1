<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Đăng ký</title>
</head>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
</style>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h2>Đăng ký</h2>
                    <br>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="tens">Họ và tên</label>
                            <input type="text" id="tens" class="form-control form-control-lg" name="tens"  />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="anh_dai_dien">Ảnh Đại Diện:</label>
                            <input type="file" class="form-control" id="anh_dai_dien"
                            class="form-control form-control-lg" name="anh_dai_dien">
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="email" class="form-control form-control-lg" name="email"  />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="mat_khau">Mật khẩu</label>
                            <input type="password" id="mat_khau" class="form-control form-control-lg" name="mat_khau"  />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="so_dien_thoai">Số điện thoại</label>
                            <input type="tel" id="so_dien_thoai" class="form-control form-control-lg" name="so_dien_thoai" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="ngay_sinh">Ngày sinh</label>
                            <input type="date" id="ngay_sinh" class="form-control form-control-lg" name="ngay_sinh" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="dia_chi">Địa chỉ</label>
                            <input type="text" id="dia_chi" class="form-control form-control-lg" name="dia_chi" />
                        </div>

                        <p id="er_reg" class="text-danger"></p>
                        <button type="submit" class="btn btn-primary btn-lg btn-block" style="width:100%;">Đăng ký</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="index.php?act=login">Đã có tài khoản? Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    var er_reg = document.getElementById('er_reg');
</script>

</html>