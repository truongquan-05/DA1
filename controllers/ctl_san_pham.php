<?php

class SanPham
{
    public function san_pham()
    {
        $count = (new Md_san_pham())->count_SanPham();

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($_GET['page'] <= 0) {
                $page = 1;
            }
            $offset = ($page - 1) * 16;
        } else {
            $count['COUNT(id_san_pham)'] = 0;
            $page = 1;
            $offset = 0;
        }

        $san_pham = (new Md_san_pham())->show_all_san_pham($offset);

        if (isset($_GET['by'])) {
            $min_max = (new Md_san_pham())->show_san_pham_min($_GET['by'], $offset);
        } else {
            $min_max = [];
        }

        if (isset($_GET['danh_muc'])) {
            $sp_danh_muc = (new Md_san_pham())->show_san_pham_danh_muc($_GET['danh_muc'], $offset);
        } else {
            $sp_danh_muc = [];
        }
        $danh_muc = (new Md_danh_muc())->all();
        view('SanPham/SanPham', ['san_pham' => $san_pham, 'danh_muc' => $danh_muc, 'count' => $count, 'min_max' => $min_max, 'sp_danh_muc' => $sp_danh_muc, 'page' => $page]);

        if (isset($_SESSION['id_khach_hang'])) {

            $data = (new Md_Gio_Hang())->find_all_yeu_thich($_SESSION['id_khach_hang']);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_san_pham'])) {
            $stt = true;
            foreach ($data as $values) {
                if ($_POST['id_san_pham'] == $values['id_san_pham']) {
                    $stt = false;
                }
            }
            if ($stt && isset($_SESSION['id_khach_hang'])) {
                (new Md_Gio_Hang())->yeu_thich($_POST['id_san_pham'], $_SESSION['id_khach_hang']);
            }
            if (empty($_SESSION['id_khach_hang'])) {
                echo "<script type='text/javascript'>
            window.location.href = 'index.php?act=404';
        </script>";
            }
        }
    }
    function hienThiThongBao_Error($id)
    {
        echo "<script type='text/javascript'>
                   setTimeout(() => {
                        Swal.fire({
                            title: 'Số lượng sản phẩm trong không đủ',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then(()=>{
                             window.location.href = 'index.php?act=chi_tiet_san_pham&id=$id';
                        })
                    }, 100);
                    </script>";
    }
    function hienThiThongBao($id)
    {
        echo "<script type='text/javascript'>
                   setTimeout(() => {
                        Swal.fire({
                            title: 'Đã thêm vào giỏ hàng',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(()=>{
                             window.location.href = 'index.php?act=chi_tiet_san_pham&id=$id';
                        })
                    }, 100);
                    </script>";
    }

    public function chi_tiet_san_pham()
    {
        if (isset($_GET['id']) && $_GET['id'] != '' && (int)$_GET['id'] >0 ) {
            $id = $_GET['id'];





            $danh_muc = (new Md_danh_muc())->all();
            $san_pham = (new Md_san_pham())->san_pham_chi_tiet($id);
            $hinh_anh = (new Md_san_pham())->hinh_anh($id);
            $bien_the = (new Md_san_pham())->bien_the_san_pham($id);
            $tham_khao = (new Md_san_pham())->show_all_san_pham(0);


            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            if ($id <= 0) {
                echo "Không tìm thấy sản phẩm";
                return;
            }

            $md_san_pham = new Md_san_pham();
            $data = $md_san_pham->find_one($id);
            if (!$data) {
                echo "Không tìm thấy sản phẩm";
                return;
            }
            // Xử lý thêm bình luận
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['binh_luan'])) {
                if (!isset($_SESSION['id_khach_hang'])) {
                    echo "<script type='text/javascript'>
                alert('Cần đăng nhập để bình luận');
                window.location.href = 'index.php?act=chi_tiet_san_pham&id= $id';
                </script>";
                    return;
                }
                $noi_dung = trim($_POST['noi_dung']);
                if (empty($noi_dung)) {
                    echo "Nội dung bình luận không được để trống.";
                    return;
                }

                (new BinhLuan())->themBinhLuan($_SESSION['id_khach_hang'], $id, $noi_dung);
                header("Location: index.php?act=chi_tiet_san_pham&id=" . $id);
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['danh_gias'])) {
                // Kiểm tra người dùng đã đăng nhập chưa
                if (!isset($_SESSION['id_khach_hang'])) {

                    echo "<script type='text/javascript'>
                        alert('Cần đăng nhập để đánh giá');
                        window.location.href = 'index.php?act=chi_tiet_san_pham&id= $id';
                        </script>";

                    exit();
                }

                // Lấy dữ liệu từ form
                $diem_danh_gia = $_POST['diem_danh_gia'];
                $noi_dung = trim($_POST['noi_dung']);
                $id_khach_hang = $_SESSION['id_khach_hang'];
                $id_hdct = $_SESSION['id_hoa_don'];

                // Kiểm tra dữ liệu hợp lệ


                // Thêm đánh giá vào cơ sở dữ liệu
                $result = (new Md_san_pham())->add_danh_gia($id, $id_khach_hang, $diem_danh_gia, $noi_dung, $id_hdct);


                if ($result) {
                    unset($_SESSION['id_hoa_don']);
                    header("Location: index.php?act=chi_tiet_san_pham&id=" . $id);
                    exit();
                } else {
                    echo "Có lỗi khi thêm đánh giá.";
                }
            }


            // Lấy bình luận và đánh giá
            $total_binh_luan = $md_san_pham->count_binh_luan_by_san_pham_id($id);
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($_GET['page'] <= 0) {
                    $page = 1;
                }
                $offset = ($page - 1) * 5;
            } else {

                $page = 1;
                $offset = 0;
            }
            $binh_luan = $md_san_pham->get_binh_luan_by_san_pham_id($id, $offset);

            $danh_gia = $md_san_pham->get_danh_gia_by_san_pham_id($id);

            // Tính điểm trung bình đánh giá
            $tong_diem = array_sum(array_column($danh_gia, 'diem_danh_gia'));
            $so_luong_danh_gia = count($danh_gia);
            $diem_trung_binh = $so_luong_danh_gia > 0 ? round($tong_diem / $so_luong_danh_gia, 1) : 0;


            //THÊM SẢN PHẨM TRONG GIỎ HÀNG
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['buy__product']) && isset($_SESSION['id_khach_hang']) && isset($_POST['id_san_pham_chi_tiet'])) {

                $stt = true;
                $data_gio_hang['id_khach_hang'] = $_SESSION['id_khach_hang'];
                $data_gio_hang['id_san_pham_chi_tiet'] = $_POST['id_san_pham_chi_tiet'];
                $data_gio_hang['so_luong'] = $_POST['so_luong_mua'];

                $san_pham_gio_hang = (new Md_Gio_Hang)->find_all($data_gio_hang['id_khach_hang']);
                $sl_add = (new $md_san_pham)->find_CTSP($data_gio_hang['id_san_pham_chi_tiet']);
                $check_so_luong_add = true;

                if ($data_gio_hang['so_luong'] > $sl_add['so_luong']) {
                    $check_so_luong_add = false;
                }


                foreach ($san_pham_gio_hang as $value) {
                    if ($value['id_san_pham_chi_tiet'] == $data_gio_hang['id_san_pham_chi_tiet']) {
                        $stt = false;
                        $data_gio_hang['so_luong'] += $value['so_luong_mua'];

                        foreach ($bien_the as $value2) {

                            if ($value2['id'] == $value['id_san_pham_chi_tiet']) {
                                if ($data_gio_hang['so_luong'] <= $value2['so_luong']) {

                                    $this->hienThiThongBao($id);
                                    (new Md_Gio_Hang())->update_gio_hang($value['id_san_pham_chi_tiet'], $data_gio_hang['id_khach_hang'], $data_gio_hang['so_luong']);
                                } else {
                                    $this->hienThiThongBao_Error($id);
                                    (new Md_Gio_Hang())->update_gio_hang($value['id_san_pham_chi_tiet'], $data_gio_hang['id_khach_hang'], $value2['so_luong']);
                                }
                            }
                        }
                    }
                }


                if ($stt && $check_so_luong_add) {
                    (new Md_Gio_Hang)->add_gio_hang($data_gio_hang);
                    $this->hienThiThongBao($id);
                } elseif ($stt) {
                    $this->hienThiThongBao_Error($id);
                }
            }


            //Mua SAN PHAM
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy__product']) && isset($_SESSION['id_khach_hang']) && isset($_POST['id_san_pham_chi_tiet'])) {
                //XÓA CÁC SS ĐÃ TỒN TẠI
                $keep_sessions = ['id_khach_hang', 'name_khach_hang', 'avt', 'vai_tro'];
                foreach ($_SESSION as $key => $value) {
                    if (!in_array($key, $keep_sessions)) {
                        unset($_SESSION[$key]); // Xóa các session không cần thiết
                    }
                }


                $stt = true;
                $_SESSION['buy__product'] = $_POST['buy__product'];
                $_SESSION['id_san_pham_chi_tiet'] = $_POST['id_san_pham_chi_tiet'];
                $_SESSION['so_luong'] = $_POST['so_luong_mua'];

                header("location: index.php?act=thanh_toan");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['id_san_pham_chi_tiet'])) {
                echo "<script type='text/javascript'>
                     alert('Chưa chọn cấu hình');
                </script>";
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SESSION['id_khach_hang'])) {
                echo "<script type='text/javascript'>
                alert('Chưa đăng nhập');
           </script>";
            }





            view("SanPham/ChiTietSanPham", [
                'san_pham' => $san_pham,
                'bien_the' => $bien_the,
                'hinh_anh' => $hinh_anh,
                'tham_khao' => $tham_khao,
                'danh_muc' => $danh_muc,
                'data' => $data,
                'binh_luan' => $binh_luan,
                'danh_gia' => $danh_gia,
                'diem_trung_binh' => $diem_trung_binh,
                'so_luong_danh_gia' => $so_luong_danh_gia,
                'total_binh_luan' => $total_binh_luan,
                'page' => $page

            ]);
        } else {
            (new HomeController)->error();
        }
    }
}
