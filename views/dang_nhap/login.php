<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
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
                    <h2>Đăng nhập</h2>
                    <br>
                    <form method="POST">
                        <div data-mdb-input-init class="form-outline mb-4">

                            <label class="form-label" for="form1Example13">Email</label>
                            <input type="text" id="form1Example13" class="form-control form-control-lg" name="email"/>
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Mật khẩu</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="mat_khau"/>
                        </div>
                        
                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <div class="form-check">
                                <a href="index.php?ctl=quenmk">Quên mật khẩu</a>
                            </div>
                            <a href="index.php?act=register">Đăng ký</a>
                        </div>
                        <p id="er_reg"></p>
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="width:100%;">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php ?>

</body>
<script>
    var er_reg = document.getElementById('er_reg');
</script>

</html>