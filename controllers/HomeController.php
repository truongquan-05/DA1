<?php

class HomeController
{
    public function index()
    {
        $stt = true;
        $san_pham = (new Md_san_pham())->show_san_pham();
        $banner = (new Md_danh_muc())->banner();
        $danh_muc = (new Md_danh_muc())->all();
        view('home', ['san_pham' => $san_pham, 'danh_muc' => $danh_muc, 'banner' => $banner]);
        if (isset($_SESSION['id_khach_hang'])) {
            $data = (new Md_Gio_Hang())->find_all_yeu_thich($_SESSION['id_khach_hang']);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_san_pham'])) {

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
    public function error()
    {
        $danh_muc = (new Md_danh_muc())->all();
        view('404', ['danh_muc' => $danh_muc]);
    }
}
