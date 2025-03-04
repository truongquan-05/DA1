<?php

class LienHe
{
    public function lien_he()
    {
        if (isset($_SESSION['id_khach_hang']) && isset($_GET['id_khach_hang'])) {
            $id_khach_hang = $_GET['id_khach_hang'];
            $admin = (new lien_he_client())->id_admin();
            $danh_muc = (new Md_danh_muc())->all();
            $data = (new lien_he_client)->hien_thi_tin_nhan($id_khach_hang, $admin['id_khach_hang']);

            view('LienHe', ['data' => $data, 'admin' => $admin, 'danh_muc' => $danh_muc]);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if ($_POST['noi_dung'] != "") {
                    $noi_dung['noi_dung'] = $_POST['noi_dung'];
                    $noi_dung['id_nguoi_gui'] = $id_khach_hang;
                    $noi_dung['id_nguoi_nhan'] = $admin['id_khach_hang'];
                    (new lien_he_client())->insert_tin_tin($noi_dung);
                    echo "<script type='text/javascript'>
                                window.location.href = 'index.php?act=lien_he&id_khach_hang=$id_khach_hang';
                            </script>";
                }
            }
        }else{
            (new HomeController)->error();
        }
    }
}
