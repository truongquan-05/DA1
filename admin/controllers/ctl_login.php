<?php

class loginController
{
    //ĐĂNG NHẬP
    public function login()
    {
        $results = (new KhachHang())->all();
        view("dang_nhap/login");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stt = false;
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                foreach ($results as $user) {
                    if ($_POST['email'] == $user['email'] && password_verify($_POST['mat_khau'],$user['mat_khau'])  ) {
                        $stt = true;
                        $_SESSION['id_khach_hang'] = $user['id_khach_hang'];
                        $_SESSION['name_khach_hang'] = $user['tens'];
                        $_SESSION['avt'] = $user['anh_dai_dien'];
                        $_SESSION['vai_tro'] = $user['vai_tro'];

                        if ($user['vai_tro'] == "nhan vien") {
                            $_SESSION['id_admin'] = $user['id_khach_hang'];
                            header("Location: admin/index.php?act=dashboard");
                        } else {
                            header("Location: ../index.php");
                        }
                        exit();
                    }
                }

                if (!$stt) {
                    echo "<script type='text/javascript'>
                        document.getElementById('er_reg').innerText = 'Email hoặc mật khẩu sai';
                      </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                    document.getElementById('er_reg').innerText = 'Định dạng email không hợp lệ';
                  </script>";
            }
        }
    }
    //ĐĂNG KÝ
    public function register()
    {
        view("dang_nhap/register");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $data["vai_tro"] = "khach hang";

            // Xử lý upload ảnh
            $img = "";
            $file_anh = $_FILES['anh_dai_dien'];

            if (isset($file_anh['name']) ) {
                
                    if ($file_anh['size'] > 0) {
                        $path_img = "image/".$file_anh['name'] ;
                        if (move_uploaded_file($file_anh['tmp_name'], $path_img)) {
                            $img = $path_img;
                        }
                    }

                $data['anh_dai_dien'] = $img;
            } else {
                $data['anh_dai_dien'] = $img;
            }


            if (!empty($data['tens']) && !empty($data['email']) && !empty($data['mat_khau']) && !empty($data['so_dien_thoai']) && !empty($data['ngay_sinh']) && !empty($data['dia_chi'])) {
                if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    if (strlen($data['so_dien_thoai']) == 10) {
                        if (strlen($data['mat_khau']) >= 5) {  // Kiểm tra độ dài mật khẩu
                            $khachHang = new KhachHang();
                            if ($khachHang->checkEmailExists($data['email'])) {
                                echo "<script type='text/javascript'>
                                    document.getElementById('er_reg').innerText = 'Email đã tồn tại';
                                  </script>";
                                return;
                            }
                            if ($khachHang->checkPhoneExists($data['so_dien_thoai'])) {
                                echo "<script type='text/javascript'>
                                    document.getElementById('er_reg').innerText = 'Số điện thoại đã tồn tại';
                                  </script>";
                                return;
                            }
                            $ngay_sinh = new DateTime($data['ngay_sinh']);
                            $ngay_hien_tai = new DateTime();
                            if ($ngay_sinh > $ngay_hien_tai) {
                                echo "<script type='text/javascript'>
                                    document.getElementById('er_reg').innerText = 'Ngày sinh không hợp lệ';
                                  </script>";
                                return;
                            }
                            $data['mat_khau'] = password_hash($data['mat_khau'],PASSWORD_DEFAULT);
                            $result = $khachHang->dang_ky($data);

                            
                            if ($result) {
                                echo "<script type='text/javascript'>
                                    alert('Đăng ký thành công!');
                                    window.location.href = 'index.php?act=login';
                                  </script>";
                            } else {
                                echo "<script type='text/javascript'>
                                    document.getElementById('er_reg').innerText = 'Đăng ký thất bại. Vui lòng thử lại.';
                                  </script>";
                            }
                        } else {
                            echo "<script type='text/javascript'>
                                document.getElementById('er_reg').innerText = 'Mật khẩu phải có ít nhất 5 ký tự';
                              </script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>
                            document.getElementById('er_reg').innerText = 'Số điện thoại không hợp lệ';
                          </script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
                        document.getElementById('er_reg').innerText = 'Định dạng email không hợp lệ';
                      </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                    document.getElementById('er_reg').innerText = 'Vui lòng điền đầy đủ thông tin';
                  </script>";
            }
        }
    }



    //ĐĂNG XUẤT

    public function log_out()
    {
        session_unset();
        header("Location: index.php");
    }
}
