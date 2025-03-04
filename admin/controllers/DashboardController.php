<?php

class DashboardController
{

    public function index()
    {
        require_once "./views/dashboard.php";
    }
    public function lien_he()
    {
        if (isset($_SESSION['id_admin'])) {
            $id_nhan = $_SESSION['id_admin'];
        }
        $data = null;
        $id_nguoi_nt = (new lien_he())->inbox();
        //MẢNG LƯU THÔNG TIN KHÔNG ĐƯỢC TRÙNG NHAU
        $array = [];
        foreach ($id_nguoi_nt as $item1) {
            $data = (new lien_he())->noi_dung_hien_thi($item1['id_nguoi_gui'], $item1['id_nguoi_nhan']);
            $isDuplicate = false;
            foreach ($array as $item2) {
                if (isset($item2['id_nguoi_gui'])) {
                    if ($data['id_nguoi_gui'] == $item2['id_nguoi_gui'] && $data['id_nguoi_nhan'] == $item2['id_nguoi_nhan']) {
                        $isDuplicate = true;
                        break;
                    }
                }
            }
            if ($isDuplicate != true) {
                $array[] = $data;
            }
        }
        $du_lieu =  (new lien_he())->tin_nhan_khach_hang($id_nhan); //sau doi sang session
        view('lienhe', ['du_lieu' => $du_lieu, 'data' => $data, 'nguoi_nt' => $array]);
    }




    public function ho_tro_khach_hang()
    {
        if (isset($_SESSION['id_admin'])) {
            $id_nhan = $_SESSION['id_admin'];
        }
        $id = $_GET['id'];
        $data =  (new lien_he())->hien_thi_tin_nhan($id, $_SESSION['id_admin']);
        view('hotrokhachhang', ['du_lieu' => $data], $id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['trang_thai'])) {
                $data__ = $_POST;
                (new lien_he())->update_tn($data__, $id, $id_nhan);
                echo "<script type='text/javascript'>
                        window.location.href = 'index.php?act=lienhe';
                    </script>";
                exit();
                
            }
            $_POST['id_nguoi_gui'] = $id_nhan;
            $_POST['id_nguoi_nhan'] = $id;
            $du_lieu = $_POST;
            if ($_POST['noi_dung'] != "") {
                (new lien_he())->insert_tin_tin($du_lieu);
                echo "<script type='text/javascript'>
                        window.location.href = 'index.php?act=ho_tro_khach_hang&id=$id';
                    </script>";
            }
        }
    }
}
