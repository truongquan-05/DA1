<?php

// Require file Common
require_once 'commons/env.php'; // Khai báo biến môi trường
require_once 'commons/function.php'; // Hàm hỗ trợ

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once "controllers/ctl_san_pham.php";
require_once "admin/controllers/ctl_login.php";
require_once "controllers/ctl_TinTuc.php";
require_once "controllers/TaiKhoan.php";
require_once "controllers/CTL_KhuyenMai.php";
require_once "controllers/CTL_LienHe.php";
require_once "controllers/CTL_GIoHang.php";

// Require toàn bộ file Models
require_once "models/md_sanpham.php";
require_once "models/md_danh_muc.php";
require_once "models/md_sanpham.php";
require_once "admin/models/md_khach_hang.php";
require_once "models/Md_LienHe.php";
require_once "models/md_tin_tuc.php";
require_once "models/khuyen_mai_md.php";
require_once "models/md_khach_hang.php";
require_once "models/md_GioHang.php";
require_once "models/md_binh_luan.php";
// Route
$act = $_GET['act'] ?? '';
session_start();




switch ($act) {
    case 'trang_chu':
    case '/':
    case '':
        (new HomeController())->index();
        break;
    case 'san_pham':
        (new SanPham())->san_pham();
        break;
    case 'chi_tiet_san_pham':
        (new SanPham())->chi_tiet_san_pham();
        break;
    case 'logout':
        (new loginController())->log_out();
        break;
    case 'login':
        (new loginController())->login();
        break;
    case 'register':
        (new loginController())->register();
        break;
    case 'tin_tuc':
        (new TinTuc())->tin_tuc();
        break;
    case 'ChiTiet':
        (new TinTuc())->chi_tiettin_tuc();
        break;
    case 'thong_tin_ca_nhan':
        (new TaiKhoan_ctl())->update_khach_hang();
        break;
    case 'doi_mat_khau':
        (new TaiKhoan_ctl())->doi_mat_khau();
        break;
    case 'khuyen_mai':
        (new KhuyenMai())->khuyen_mai();
        break;
    case 'lien_he':
        (new LienHe())->lien_he();
        break;
    case 'gio_hang':
        (new Gio_Hang())->gio_hang();
        break;
    case 'delete_gio_hang':
        (new Gio_Hang())->delete_gio_hang();
        break;
    case 'thanh_toan':
        (new Gio_Hang())->thanh_toan();
        break;
    case 'don_hang':
        (new Gio_Hang())->don_hang();
        break;
    case 'don_hang_chi_tiet':
        (new Gio_Hang())->don_hang_chi_tiet();
        break;
    case 'yeu_thich':
        (new Gio_Hang())->yeu_thich();
        break;
    case 'yeu_thich_delete':
        (new Gio_Hang())->delete_yeu_thich();
        break;
    case '404':
        (new HomeController())->error();
        break;
    default:
        (new HomeController())->error();
        break;
}
