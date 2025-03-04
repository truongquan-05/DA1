<?php

class Don_hang
{

    public function all_don_hang()
    {
        $data_hoa_don = (new Md_Hoa_Don())->all_hoa_don();

        view('quan_ly_don_hang/hien_thi', ['data_hoa_don' => $data_hoa_don]);
    }
    public function don_hang_chi_tiet()
    {
        $tr_thai = (new Md_Hoa_Don())->trang_thai_dh();
        $id = $_GET['id'];

        $data_tt = (new Md_Hoa_Don())->find_tt($id);
        //THÔNG TIN HÓA ĐƠN
        $hoa_don = (new Md_Hoa_Don())->find_hoa_don($id);
        $voucher = (new khuyenmais)->all();
        //THÔNG TIN HÓA ĐƠN CHI TIẾT
        $chi_tiet_hoa_don = (new Md_Hoa_Don())->hoa_don_chi_tiet($id);


        view('quan_ly_don_hang/chi_tiet', ['chi_tiet_hoa_don' => $chi_tiet_hoa_don, 'tr_thai' => $tr_thai, 'data_tt' => $data_tt, 'hoa_don' => $hoa_don, 'voucher' => $voucher]);


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['trang_thai'])) {
            $tt = $_POST['trang_thai'];
            if ($tt == 5) {
                $tt_thanh_toan = 'Đã thanh toán';
            } else {
                $tt_thanh_toan = 'Chưa thanh toán';
            }
         
            (new Md_Hoa_Don())->update_tt($id, $tt_thanh_toan, $tt);


            //CẬP NHẬT LẠI SẢN PHẨM KHI ĐƠN HÀNG HỦY
            if ($tt >= 6) {
                $unsuccessful = [];
                $id_flag = [];

                foreach ($chi_tiet_hoa_don as $item) {

                    if (!in_array($item['id_hoa_don_chi_tiet'], $id_flag)) {

                        array_push($id_flag, $item['id_hoa_don_chi_tiet']);
                        $unsuccessful[] = $item;
                    }
                }

                foreach ($unsuccessful as $index => $items) {
                    $data_san_pham_HUY = (new Md_san_pham)->find_CTSP($items['id_chi_tiet_san_pham']);


                    $sl_HUY = $items['so_luong_mua'] + $data_san_pham_HUY['so_luong'];
                    (new Md_san_pham())->update_SL_SPCT($data_san_pham_HUY['id'], $sl_HUY);
                }
            }
            echo "<script type='text/javascript'>
                    window.location.href = 'index.php?act=don_hang';
                </script>";
        }
    }


    public function delete_don_hang()
    {
        $id = $_GET['id_hoa_don'];
        (new Md_Hoa_Don())->delete_don_hang($id);
        header("location: index.php?act=don_hang");
    }
}
