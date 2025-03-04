<?php

class Ctl_san_pham
{
    public function show()
    {
        $data = (new Md_san_pham())->show();
        $anh = (new Md_san_pham())->show_anh();
        view('san_pham/hien_thi', ['data' => $data, 'anh' => $anh]);
    }

    public function them_san_pham()
    {
        $danh_muc = (new DanhMuc())->all();
        view('san_pham/add', ['danh_muc' => $danh_muc]);



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $check_pb = true;
            $check_ms = true;
            $check_sl = true;
            $check_gb = true;
            $check_gn = true;

            if (isset($_POST['phien_ban'])) {
                foreach ($_POST['phien_ban'] as $index => $value) {

                    if ($value == "") {
                        $check_pb = false;
                        break;
                    }
                }
                foreach ($_POST['mau_sac'] as $index => $value) {

                    if ($value == "") {
                        $check_ms = false;
                        break;
                    }
                }
                foreach ($_POST['so_luong'] as $index => $value) {
                    $stt_sl = false;

                    if (is_numeric($value)) {  //KIỂM TRA SỐ
                        $stt_sl = true;
                    }
                    if ($value == "") {
                        $check_sl = false;
                        break;
                    }
                }
                foreach ($_POST['gia_ban'] as $index => $value) {
                    $stt_ban = false;

                    if (is_numeric($value)) {
                        $stt_ban = true;
                    }
                    if ($value == "") {
                        $check_gb = false;
                        break;
                    }
                }
                foreach ($_POST['gia_nhap'] as $index => $value) {
                    $stt_nhap = false;

                    if (is_numeric($value)) {
                        $stt_nhap = true;
                    }
                    if ($value == "") {
                        $check_gn = false;
                        break;
                    }
                }

                $check_trung_lap = true;
                foreach ($_POST['phien_ban'] as $index1 => $value1) {
                    foreach ($_POST['phien_ban'] as $index2 => $value2) {
                        if ($index1 < $index2 && $value1 == $value2) {
                            if ($_POST['mau_sac'][$index1] == $_POST['mau_sac'][$index2]) {
                                $check_trung_lap = false;
                            }
                        }
                    }
                }

                //KIỂM TRA RAM/ROM ĐÚNG ĐỊNH DẠNG
                $char = true;
                foreach ($_POST['phien_ban'] as $index1 => $value1) {
                    if (strpos($value1, '/') === false) {
                        $char = false;
                        break;
                    }
                }
            }




            if ($_POST['ten_san_pham'] != "") {
                if ($_POST['id_danh_muc'] != 0) {
                    if (isset($_POST['phien_ban'])) {
                        if ($check_pb) {
                            if ($check_ms) {
                                if ($check_gn && $check_gb) {
                                    if ($check_sl) {

                                        if ($stt_sl  && $stt_ban && $stt_nhap) {
                                            if ($char) {
                                                $du_lieu_sp = [];
                                                $du_lieu_bien_the = [];
                                                $du_lieu_phien_ban = [];
                                                $data = $_POST;
                                                $data['luot_xem'] = 0;

                                                $img = [];
                                                $file_anh = $_FILES['hinh_anh'];

                                                if (isset($file_anh['name']) && count($file_anh['name']) > 0) {
                                                    foreach ($file_anh['name'] as $index => $value) {
                                                        if ($file_anh['size'][$index] > 0) {
                                                            $path_img = "image/" . $value;
                                                            if (move_uploaded_file($file_anh['tmp_name'][$index], $path_img)) {
                                                                $img[] = $value;
                                                            }
                                                        }
                                                    }

                                                    $data['hinh_anh'] = $img;
                                                } else {
                                                    $data['hinh_anh'] = "";
                                                }

                                                $du_lieu_sp = [
                                                    'ten_san_pham' => $data['ten_san_pham'],
                                                    'id_danh_muc'  => $data['id_danh_muc'],
                                                    'mo_ta_ngan'   => $data['mo_ta_ngan'],
                                                    'mo_ta_dai'    => $data['mo_ta_dai'],
                                                    'luot_xem'     => $data['luot_xem'],
                                                ];
                                                (new Md_san_pham())->creat_san_pham($du_lieu_sp);

                                                $new_id = (new Md_san_pham())->find_one_time();
                                                $id_sp = $new_id['id_san_pham'];  // LẤY ID CỦA SẢN PHẨM


                                                $all_img = $data['hinh_anh'];
                                                foreach ($all_img as $value) {
                                                    $hinh_anhs['id_san_pham'] = $id_sp;
                                                    $hinh_anhs['hinh_anh'] = $value;
                                                    (new Md_san_pham())->creat_hinh_anh($hinh_anhs); // THÊM HÌNH ẢNH


                                                }


                                                $du_lieu_bien_the['id_san_pham'] = $id_sp;

                                                $gia_ban = $data['gia_ban'];
                                                $gia_nhap = $data['gia_nhap'];
                                                $so_luong = $data['so_luong'];

                                                foreach ($gia_ban as $index => $value) { // GIÁ BÁN
                                                    foreach ($gia_nhap as $index9 => $value9) {
                                                        foreach ($so_luong as $index2 => $value2) { //SỐ LƯỢNG
                                                            if ($index == $index2 && $value != "" && $value2 != "" && $index == $index9 && $value != "" && $index9 != "") {

                                                                $du_lieu_bien_the['so_luong'] = $value2;
                                                                $du_lieu_bien_the['gia_ban'] = $value;
                                                                $du_lieu_bien_the['gia_nhap'] = $value9;

                                                                (new Md_san_pham())->creat_chi_tiet_san_pham($du_lieu_bien_the);

                                                                $if_sp_ct = (new Md_san_pham())->find_one_time_chi_tiet();
                                                                $id_sp_ct = $if_sp_ct['id'];
                                                                $du_lieu_phien_ban = $data['phien_ban'];
                                                                $du_lieu_mau_sac = $data['mau_sac'];


                                                                foreach ($du_lieu_phien_ban as $index3 => $value3) { //PHIÊN BẢN
                                                                    if ($index3 == $index && $index3 == $index2 && $value2 != "" && $value3 != "") {

                                                                        $dl_pb['id_chi_tiet_san_pham']  = $id_sp_ct;
                                                                        $dl_pb['phien_ban'] = trim($value3);

                                                                        (new Md_san_pham())->creat_phien_ban($dl_pb);

                                                                        break;
                                                                    }
                                                                }
                                                                foreach ($du_lieu_mau_sac as  $index4 => $value4) { //MÀU SẮC
                                                                    if ($index4 == $index && $index4 == $index2 && $value2 != "" && $value4 != "" && $index3 == $index4) {
                                                                        $dl_ms['id_chi_tiet_san_pham']  = $id_sp_ct;
                                                                        $dl_ms['mau_sac'] = trim($value4);
                                                                        (new Md_san_pham())->creat_mau_sac($dl_ms);
                                                                        break;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                echo "<script type='text/javascript'>
                                                    window.location.href = 'index.php?act=san_pham';
                                                </script>";
                                            } else {
                                                echo "<script type='text/javascript'>
                                                            er_san_pham.innerText = 'Chưa đúng định dạng RAM/ROM';
                                                            </script>";
                                            }
                                        } else {
                                            echo "<script type='text/javascript'>
                                            er_san_pham.innerText = 'Chưa đúng định dạng';
                                        </script>";
                                        }
                                    } else {
                                        echo "<script type='text/javascript'>
                                    er_san_pham.innerText = 'Chưa nhập số lượng';
                                  </script>";
                                    }
                                } else {
                                    echo "<script type='text/javascript'>
                                er_san_pham.innerText = 'Chưa nhập giá đầy đủ';
                              </script>";
                                }
                            } else {
                                echo "<script type='text/javascript'>
                            er_san_pham.innerText = 'Chưa nhập màu sắc';
                          </script>";
                            }
                        } else {
                            echo "<script type='text/javascript'>
                        er_san_pham.innerText = 'Chưa nhập Ram/Rom';
                      </script>";
                        }
                    } else {
                        echo "<script type='text/javascript'>
                        er_san_pham.innerText = 'Chưa nhập cấu hình';
                      </script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
                    er_san_pham.innerText = 'Chưa chọn danh mục';
                  </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                er_san_pham.innerText = 'Chưa nhập tên sản phẩm';
              </script>";
            }
        }

    }









    public function update_san_pham()
    {
        $id = $_GET['id']; // ID SẢN PHẨM
        $data = (new Md_san_pham())->find_one($id);
        $danh_muc = (new DanhMuc())->all();
        $anhs = (new Md_san_pham())->show_anh_san_pham($id);
        $sp_chi_tiet = (new Md_san_pham())->find_one_sp_chi_tiet($id);

        $all_phien_ban = [];
        $all_mau_sac = [];

        foreach ($sp_chi_tiet as $value) {
            $phien_ban = (new Md_san_pham())->find_one_phien_ban($value['id']);
            foreach ($phien_ban as $value2) {
                $all_phien_ban[] = $value2;
            }
            $mau_sac = (new Md_san_pham())->find_one_mau_sac($value['id']);
            foreach ($mau_sac as $value3) {
                $all_mau_sac[] = $value3;
            }
        }

        view('san_pham/update', ['data' => $data, 'danh_muc' => $danh_muc, 'anhs' => $anhs, 'sp_chi_tiet' => $sp_chi_tiet, 'all_phien_ban' => $all_phien_ban, 'all_mau_sac' => $all_mau_sac]);


        //CẬP NHẬT ẢNH
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $img = [];
            //LẤY DỮ LIỆU ẢNH CŨ
            $data_anh = (new Md_san_pham())->show_anh_san_pham($id);
            $file_anh = $_FILES['hinh_anh'];

            if ($file_anh['size'][0] > 0) {
                foreach ($file_anh['name'] as $index => $value) {
                    $img[] = $value; //LƯU ẢNH MỚI VÀO MẢNG
                }

                //CẬP NHẬT ẢNH MỚI 
                foreach ($data_anh as $index1 => $value1) {
                    $du_lieu_anh['id'] = $value1['id'];
                    foreach ($img as $index3 => $value3) {
                        if ($index1 == $index3) {
                            $du_lieu_anh['hinh_anh'] = $value3;
                            $path_img = "image/" . $value3;
                            move_uploaded_file($file_anh['tmp_name'][$index3], $path_img);
                            (new Md_san_pham())->update_hinh_anh($du_lieu_anh);
                            break;
                        }
                    }
                }
            }
            if (empty($data_anh)) {
                $img = [];
                $file_anh = $_FILES['hinh_anh'];

                if (isset($file_anh['name']) && count($file_anh['name']) > 0) {
                    foreach ($file_anh['name'] as $index => $value) {
                        if ($file_anh['size'][$index] > 0) {
                            $path_img = "image/" . $value;
                            if (move_uploaded_file($file_anh['tmp_name'][$index], $path_img)) {
                                $img[] = $value;
                            }
                        }
                    }

                    $data['hinh_anh'] = $img;
                } else {
                    $data['hinh_anh'] = "";
                }
                $all_img = $data['hinh_anh'];
                foreach ($all_img as $value) {
                    $hinh_anhs['id_san_pham'] = $id;
                    $hinh_anhs['hinh_anh'] = $value;
                    (new Md_san_pham())->creat_hinh_anh($hinh_anhs); // THÊM HÌNH ẢNH


                }
            }




            $stt = true;
            foreach ($_POST['so_luong'] as $index => $value) {
                if ($value == "") {
                    $stt = false;
                    break;
                }
            }
            foreach ($_POST['gia_ban'] as $index => $value) {
                if ($value == "") {
                    $stt = false;
                    break;
                }
            }
            foreach ($_POST['gia_nhap'] as $index => $value) {
                if ($value == "") {
                    $stt = false;
                    break;
                }
            }

            foreach ($_POST['mau_sac'] as $index => $value) {
                if (trim($value) == "") {
                    $stt = false;
                    break;
                }
            }




            if ($_POST['ten_san_pham'] != "") {
                if ($stt) {






                    //UPDATE SẢN PHẨM
                    $du_lieu_sp = [
                        'ten_san_pham' => $_POST['ten_san_pham'],
                        'id_danh_muc'  => $_POST['id_danh_muc'],
                        'mo_ta_ngan'   => $_POST['mo_ta_ngan'],
                        'mo_ta_dai'    => $_POST['mo_ta_dai'],
                    ];

                    (new Md_san_pham())->update_sanpham($id, $du_lieu_sp);

                    // UPDATE SẢN PHẨM CHI TIẾT
                    $du_lieu_bien_the['so_luong'] = $_POST['so_luong'];
                    $du_lieu_bien_the['gia_ban'] = $_POST['gia_ban'];
                    $du_lieu_bien_the['gia_nhap'] = $_POST['gia_nhap'];


                    foreach ($sp_chi_tiet as $index3 => $id_chi_tiet) {
                        $stt = false;
                        foreach ($du_lieu_bien_the['so_luong'] as $index => $value) {
                            if ($index3 == $index) {
                                foreach ($du_lieu_bien_the['gia_ban'] as $index1 => $value1) {
                                    foreach ($du_lieu_bien_the['gia_nhap'] as $index2 => $value2) {

                                        if ($index == $index1 && $index == $index2) {
                                            $update_bien_the['so_luong'] = $value;
                                            $update_bien_the['gia_ban'] = $value1;
                                            $update_bien_the['gia_nhap'] = $value2;

                                            (new Md_san_pham())->update_san_pham_chi_tiet($id_chi_tiet['id'], $update_bien_the);
                                            $stt = true;
                                            break;
                                        }
                                    }
                                }
                            }

                            //THOÁT LẶP ĐỂ LẤY ID SẢN PHẨM CHI TIẾT
                            if ($stt) {
                                break;
                            }
                        }
                    }

                    $count_sp = (new Md_san_pham())->count_sp($id);
                    // $count_ms = (new Md_san_pham())->count_mau_sac();
                    // $count_pb = (new Md_san_pham())->count_phien_ban();
                    foreach ($du_lieu_bien_the['so_luong'] as $index => $value) {
                        $count_bt = $index + 1;
                    }



                    //THÊM SẢN PHẨM THỪA
                    $add_bt = $count_sp['COUNT(*)'];
                    $them_bien_the = [];
                    $processedIndexes = [];
                    $processed = [];

                    if ($add_bt < $count_bt) {
                        // Duyệt qua tất cả các dữ liệu biến thể
                        foreach ($du_lieu_bien_the['so_luong'] as $index => $value) {
                            if ($add_bt - 1 >= $index) continue; // Bỏ qua nếu không cần thêm biến thể

                            foreach ($du_lieu_bien_the['gia_ban'] as $index1 => $value1) {
                                if ($index != $index1) continue; // Kiểm tra chỉ số phù hợp

                                foreach ($du_lieu_bien_the['gia_nhap'] as $index2 => $value2) {
                                    if ($index != $index2) continue; // Kiểm tra chỉ số phù hợp

                                    // Chuẩn bị dữ liệu để thêm chi tiết sản phẩm
                                    $them_bien_the = [
                                        'so_luong' => $value,
                                        'gia_ban' => $value1,
                                        'gia_nhap' => $value2,
                                        'id_san_pham' => $id,
                                    ];

                                    // Thêm chi tiết sản phẩm
                                    (new Md_san_pham())->creat_chi_tiet_san_pham($them_bien_the);

                                    // Tìm chi tiết sản phẩm vừa tạo
                                    $if_sp_ct = (new Md_san_pham())->find_one_time_chi_tiet();

                                    // Xử lý các phiên bản từ POST
                                    foreach ($_POST['phien_ban'] as $index3 => $value3) {
                                        if (in_array($index3, $processedIndexes)) {
                                            continue; // Bỏ qua nếu đã xử lý
                                        }

                                        if ($index3 == $index1 && $index == $index2 && $index == $index3) {
                                            $phien_ban_add = [
                                                'id_chi_tiet_san_pham' => $if_sp_ct['id'],
                                                'phien_ban' => $value3,
                                            ];

                                            (new Md_san_pham())->creat_phien_ban($phien_ban_add);

                                            // Đánh dấu $index3 đã xử lý
                                            $processedIndexes[] = $index3;

                                            break; // Thoát vòng lặp
                                        }
                                    }

                                    foreach ($_POST['mau_sac'] as $index4 => $value4) {
                                        if (in_array($index4, $processed)) {
                                            continue; // Bỏ qua nếu đã xử lý
                                        }

                                        if ($index4 == $index1 && $index == $index2 && $index == $index4) {
                                            $mau_sac_add = [
                                                'id_chi_tiet_san_pham' => $if_sp_ct['id'],
                                                'mau_sac' => $value4,
                                            ];

                                            (new Md_san_pham())->creat_mau_sac($mau_sac_add);

                                            // Đánh dấu $index3 đã xử lý
                                            $processed[] = $index4;
                                            break; // Thoát vòng lặp
                                        }
                                    }
                                }
                            }
                        }
                    }







                    //UPDATE BIẾN THỂ
                    $du_lieu_phien_ban['phien_ban'] = $_POST['phien_ban'];
                    $du_lieu_mau_sac['mau_sac'] = $_POST['mau_sac'];
                    // CHECK ĐỊNH DẠNG BIẾN THỂ
                    $char = true;
                    // $bt = false;
                    foreach ($_POST['phien_ban'] as $index1 => $value1) {
                        if (strpos($value1, '/') === false) {
                            $char = false;
                            break;
                        }
                    }

                    $check_trung_lap = true;

                    foreach ($_POST['phien_ban'] as $index1 => $value1) {
                        foreach ($_POST['phien_ban'] as $index2 => $value2) {
                            if ($index1 < $index2 && $value1 == $value2) {
                                if ($_POST['mau_sac'][$index1] == $_POST['mau_sac'][$index2]) {
                                    $check_trung_lap = false;
                                }
                            }
                        }
                    }



                    foreach ($sp_chi_tiet as $index => $id_chi_tiet) {
                        $stt = false;
                        foreach ($du_lieu_phien_ban['phien_ban'] as $index1 => $value1) {
                            foreach ($du_lieu_mau_sac['mau_sac'] as $index2 => $value2) {
                                if ($index == $index1 && $index == $index2) {
                                    $update_mau_sac['mau_sac'] = trim($value2);
                                    $update_phien_ban['phien_ban'] = trim($value1);
                                    if ($check_trung_lap) {
                                        if ($char) {
                                            (new Md_san_pham())->update_mau_sac($id_chi_tiet['id'], $update_mau_sac);
                                            (new Md_san_pham())->update_phien_ban($id_chi_tiet['id'], $update_phien_ban);
                                            // $bt = true;
                                        } else {
                                            echo "<script type='text/javascript'>
                                                        er_san_pham.innerText = 'Phải nhập đúng địng dạng Ram/Rom';
                                                      </script>";
                                            exit();
                                        }
                                    } else {
                                        echo "<script type='text/javascript'>
                                                er_san_pham.innerText = 'Biến thể không được trùng lặp';
                                              </script>";
                                    }
                                }
                            }


                            if ($stt) { //THOÁT LẶP ĐỂ LẤY ID SẢN PHẨM CHI TIẾT
                                break;
                            }
                        }
                    }

                    echo "<script type='text/javascript'>
                            window.location.href = 'index.php?act=san_pham';
                        </script>";
                } else {
                    echo "<script type='text/javascript'>
                            er_san_pham.innerText = 'Không được để trống biến thể';
                          </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                er_san_pham.innerText = 'Chưa nhập tên sản phẩm';
              </script>";
            }
        }


    }
















    public function delete_san_pham()
    {
        $id = $_GET['id'];
        $data = (new Md_san_pham())->show_anh_san_pham($id);


        foreach ($data as $value) {
            $img[] = $value['hinh_anh'];
        }
        if (isset($img)) {
            foreach ($img as $value1) {
                unlink("image/" . $value1);
            }
        }

        (new Md_san_pham())->delete_san_pham($id);
        echo "<script type='text/javascript'>
            window.location.href = 'index.php?act=san_pham';
        </script>";
    }


    public function chi_tiet_san_pham()
    {
        $id = $_GET['id'];
        $data = (new Md_san_pham())->find_one($id);

        if (!$data) {
            // Xử lý trường hợp không tìm thấy sản phẩm
            echo "Không tìm thấy sản phẩm";
            return;
        }

        $danh_muc = (new DanhMuc())->all();
        $anhs = (new Md_san_pham())->show_anh_san_pham($id);
        $sp_chi_tiet = (new Md_san_pham())->find_one_sp_chi_tiet($id);

        $all_phien_ban = [];
        $all_mau_sac = [];

        $md_san_pham = new Md_san_pham();

        foreach ($sp_chi_tiet as $value) {
            $phien_ban = $md_san_pham->find_one_phien_ban($value['id']);
            $mau_sac = $md_san_pham->find_one_mau_sac($value['id']);

            $all_phien_ban = array_merge($all_phien_ban, $phien_ban);
            $all_mau_sac = array_merge($all_mau_sac, $mau_sac);
        }

        // Lấy bình luận cho sản phẩm
        $binh_luan = $md_san_pham->get_binh_luan_by_san_pham_id($id);

        // Lấy đánh giá cho sản phẩm
        $danh_gia = $md_san_pham->get_danh_gia_by_san_pham_id($id);

        // Tính điểm đánh giá trung bình
        $diem_trung_binh = 0;
        $tong_diem = 0;
        $so_luong_danh_gia = count($danh_gia);

        if ($so_luong_danh_gia > 0) {
            foreach ($danh_gia as $dg) {
                $tong_diem += $dg['diem_danh_gia'];
            }
            $diem_trung_binh = round($tong_diem / $so_luong_danh_gia, 1);
        }
        view('san_pham/chi_tiet', [
            'data' => $data,
            'danh_muc' => $danh_muc,
            'anhs' => $anhs,
            'sp_chi_tiet' => $sp_chi_tiet,
            'all_phien_ban' => $all_phien_ban,
            'all_mau_sac' => $all_mau_sac,
            'binh_luan' => $binh_luan,
            'danh_gia' => $danh_gia,
            'diem_trung_binh' => $diem_trung_binh,
            'so_luong_danh_gia' => $so_luong_danh_gia
        ]);
    }
}
