-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 04, 2024 lúc 10:58 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phoneplus`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` int NOT NULL,
  `hinh_anhs` varchar(155) NOT NULL,
  `trang_thai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_them` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_banner`, `hinh_anhs`, `trang_thai`, `ngay_them`) VALUES
(23, 'image/Apple-iPhone-14-1.jpeg', 'Ẩn', '2024-11-06 07:44:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_binh_luan` int NOT NULL,
  `id_khach_hang` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_binh_luan` timestamp NOT NULL,
  `trang_thai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `id` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia_ban` float NOT NULL,
  `gia_nhap` float NOT NULL,
  `id_san_pham` int NOT NULL,
  `thoi_gian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_san_pham`
--

INSERT INTO `chi_tiet_san_pham` (`id`, `so_luong`, `gia_ban`, `gia_nhap`, `id_san_pham`, `thoi_gian`) VALUES
(190, 999, 2000, 100, 157, '2024-11-14 18:47:35'),
(191, 1000, 9999, 100, 157, '2024-11-14 18:47:35'),
(192, 100, 100, 100, 158, '2024-11-15 03:31:53'),
(193, 17, 500, 100, 158, '2024-11-15 03:31:53'),
(194, 100, 50, 100, 158, '2024-11-15 03:31:53'),
(279, 99, 100000, 100000, 175, '2024-11-17 09:35:46'),
(280, 1100, 1, 1, 175, '2024-11-17 10:22:27'),
(281, 4, 100000, 100000, 176, '2024-11-17 11:29:47'),
(282, 3, 100000, 100000, 177, '2024-11-17 12:29:37'),
(283, 103327, 20, 20, 178, '2024-11-17 15:59:50'),
(284, 0, 100000, 100000, 179, '2024-11-17 16:01:46'),
(285, 4, 1, 1, 180, '2024-11-17 16:02:07'),
(286, 98, 500, 500, 181, '2024-11-17 16:02:37'),
(287, 100, 10000000, 10000000, 182, '2024-11-18 09:50:18'),
(288, 96, 2000000, 2000000, 183, '2024-11-18 09:52:02'),
(289, 1099, 190000000, 19000000, 184, '2024-11-18 09:54:32'),
(290, 2, 28000000, 27000000, 184, '2024-11-18 09:54:32'),
(291, 1, 35000000, 35000000, 184, '2024-11-18 09:54:32'),
(292, 51, 17000000, 15000000, 185, '2024-11-18 10:06:06'),
(293, 98, 100000, 10, 158, '2024-11-20 03:54:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` int NOT NULL,
  `id_khach_hang` int NOT NULL,
  `id_hdct` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `diem_danh_gia` float NOT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danh_muc` int NOT NULL,
  `ten_danh_muc` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trang_thai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id_danh_muc`, `ten_danh_muc`, `trang_thai`) VALUES
(6, 'Sam sung', 'Hiển thị'),
(21, 'Iphone', 'Hiển thị'),
(22, 'Redmi', 'Hiển thị'),
(23, 'Nokia', 'Hiển thị'),
(24, 'Redmio', 'Ẩn'),
(25, 'Oppo', 'Hiển thị'),
(26, 'Vivo', 'Hiển thị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `id_khach_hang` int NOT NULL,
  `id_san_pham_chi_tiet` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `id_khach_hang`, `id_san_pham_chi_tiet`, `so_luong`) VALUES
(165, 36, 293, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anhs`
--

CREATE TABLE `hinh_anhs` (
  `id` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anhs`
--

INSERT INTO `hinh_anhs` (`id`, `id_san_pham`, `hinh_anh`) VALUES
(124, 157, 'samsung-galaxy-s24-ultra_5_.webp'),
(125, 157, 'samsung-galaxy-s24-ultra_6_.webp'),
(126, 157, 'samsung-galaxy-s24-ultra_12_.webp'),
(127, 158, '12_3_8_2_8.webp'),
(128, 158, '15_2_7_2_5.webp'),
(129, 158, 'iphone-15-pro-max_3.webp'),
(130, 158, 'iphone-15-pro-max_4__1.webp'),
(131, 158, 'iphone-15-pro-max_7__1.webp'),
(132, 158, 'iphone-15-pro-max_8__1.webp'),
(177, 175, 's23-ultra-tim_2.webp'),
(178, 175, 'samsung-galaxy-z-fold-6-hong_4_.webp'),
(179, 176, 'text_ng_n_6__2_114.webp'),
(180, 177, 'samsung-galaxy-z-fold-6-xanh_1_.webp'),
(181, 178, 'samsung-galaxy-z-fold-6-hong_4_.webp'),
(182, 179, 's23-ultra-tim_2.webp'),
(183, 180, 'dien-thoai-oppo-reno-11-f-2.webp'),
(184, 181, 'iphone-15-pro-max_3.webp'),
(185, 182, 'xiaomi_14t_2_.webp'),
(186, 183, 'v30e_1_.webp'),
(187, 184, 'dien-thoai-samsung-galaxy-s24-fe_3__4.webp'),
(188, 185, 'iphone-15-pro-max_3.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_dons`
--

CREATE TABLE `hoa_dons` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(15) NOT NULL,
  `id_khach_hang` int NOT NULL,
  `tong_tien` float NOT NULL,
  `so_dien_thoai` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_dat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email_nguoi_nhan` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dia_chi` varchar(155) NOT NULL,
  `ten_nguoi_nhan` varchar(155) NOT NULL,
  `phuong_thuc_thanh_toan` varchar(155) NOT NULL,
  `khuyen_mai` varchar(50) DEFAULT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trang_thai_thanh_toan` varchar(155) NOT NULL,
  `thanh_toan` float NOT NULL,
  `trang_thai_don_hang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_dons`
--

INSERT INTO `hoa_dons` (`id`, `ma_don_hang`, `id_khach_hang`, `tong_tien`, `so_dien_thoai`, `ngay_dat`, `email_nguoi_nhan`, `dia_chi`, `ten_nguoi_nhan`, `phuong_thuc_thanh_toan`, `khuyen_mai`, `ghi_chu`, `trang_thai_thanh_toan`, `thanh_toan`, `trang_thai_don_hang`) VALUES
(217, '59679', 36, 17000000, '0395438858', '2024-12-04 05:50:00', 'quanctph50803@gmail.com', 'Hà Nội', 'Quan', 'VNpay', '0', '', 'Chưa thanh toán', 17000000, 7),
(218, '37892', 36, 17000000, '0395438858', '2024-12-04 10:32:00', 'huybtph50792@gmail.com', 'Hà Nội', 'Quan', 'COD', '0', '', 'Chưa thanh toán', 17000000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `id_hoa_don_chi_tiet` int NOT NULL,
  `id_hoa_don` int NOT NULL,
  `so_luong_mua` int NOT NULL,
  `don_gia` float NOT NULL,
  `thanh_tien` float NOT NULL,
  `id_chi_tiet_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`id_hoa_don_chi_tiet`, `id_hoa_don`, `so_luong_mua`, `don_gia`, `thanh_tien`, `id_chi_tiet_san_pham`) VALUES
(215, 217, 1, 17000000, 17000000, 292),
(216, 218, 1, 17000000, 17000000, 292);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_khach_hang` int NOT NULL,
  `tens` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `email` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mat_khau` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ngay_dang_ky` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dia_chi` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vai_tro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id_khach_hang`, `tens`, `anh_dai_dien`, `email`, `mat_khau`, `so_dien_thoai`, `ngay_sinh`, `ngay_dang_ky`, `dia_chi`, `vai_tro`) VALUES
(34, 'Admin', 'image/eb6b503f039656e8358f40e303ad0c82.jpg', 'admin@gmail.com', '$2y$10$ghGYSy4fOjPPDLA3zLYRP.A.rlSE5gkaIgBNy4CUbW.jBTGJVfFbS', '0395438894', '2024-12-03', '2024-12-03 17:34:10', 'Hà Nội', 'nhan vien'),
(36, 'Quan', 'image/Screenshot 2024-10-09 165426.png', 'quanctph50803@gmail.com', '$2y$10$VFs0P.OD51mxIZBAP8S9Ou.vQV2k0j9O8ItLgSuL.5XV/PFZBL0va', '0395438858', '2024-12-02', '2024-12-03 19:10:32', 'Hà Nội', 'khach hang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `id_voucher` int NOT NULL,
  `ma_khuyen_mai` varchar(155) NOT NULL,
  `voucher` int NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `ngay_ket_thuc` date NOT NULL,
  `ten_voucher` varchar(155) NOT NULL,
  `hinh_anh` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_danh_muc` int NOT NULL,
  `ngay_bat_dau` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`id_voucher`, `ma_khuyen_mai`, `voucher`, `mo_ta`, `ngay_ket_thuc`, `ten_voucher`, `hinh_anh`, `id_danh_muc`, `ngay_bat_dau`) VALUES
(5, '2005', 5, '', '2024-11-22', 'ship', 'image/Screenshot 2024-10-09 165349.png', 6, '2024-11-13'),
(8, '940hv', 9, '', '2024-11-27', 'Giam gia', 'image/iphone-15-pro-max_3.webp', 21, '2024-11-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau_sacs`
--

CREATE TABLE `mau_sacs` (
  `id_mau_sac` int NOT NULL,
  `id_chi_tiet_san_pham` int NOT NULL,
  `mau_sac` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `mau_sacs`
--

INSERT INTO `mau_sacs` (`id_mau_sac`, `id_chi_tiet_san_pham`, `mau_sac`) VALUES
(171, 190, 'Đỏ'),
(172, 191, 'Vàng'),
(173, 192, 'Đỏ'),
(174, 193, 'Đỏ'),
(175, 194, 'Đỏ'),
(207, 279, 'Vàng'),
(208, 280, 'Vàng'),
(209, 281, 'Đỏ'),
(210, 282, 'Trắng'),
(211, 283, 'Đỏ'),
(212, 284, 'Đỏ'),
(213, 285, 'Vàng'),
(214, 286, 'Trắng'),
(215, 287, 'Xám'),
(216, 288, 'Đỏ'),
(217, 289, 'Đen'),
(218, 290, 'Xanh'),
(219, 291, 'Xám'),
(220, 292, 'Đỏ'),
(221, 293, 'Vàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phien_bans`
--

CREATE TABLE `phien_bans` (
  `id_phien_ban` int NOT NULL,
  `id_chi_tiet_san_pham` int NOT NULL,
  `phien_ban` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `phien_bans`
--

INSERT INTO `phien_bans` (`id_phien_ban`, `id_chi_tiet_san_pham`, `phien_ban`) VALUES
(187, 190, '16/512'),
(188, 191, '16/512'),
(189, 192, '16/128'),
(190, 193, '16/512'),
(191, 194, '8/64'),
(229, 279, '16/512'),
(230, 280, '16/512'),
(231, 281, '8/64'),
(232, 282, '16/512'),
(233, 283, '16/512'),
(234, 284, '8/64'),
(235, 285, '8/64'),
(236, 286, '8/64'),
(237, 287, '12/512'),
(238, 288, '12/256'),
(239, 289, '8/128'),
(240, 290, '8/128'),
(241, 291, '8/128'),
(242, 292, '12/512'),
(243, 293, '16/128');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `id_san_pham` int NOT NULL,
  `ten_san_pham` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_danh_muc` int NOT NULL,
  `luot_xem` int NOT NULL,
  `mo_ta_ngan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mo_ta_dai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `thoi_gian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`id_san_pham`, `ten_san_pham`, `id_danh_muc`, `luot_xem`, `mo_ta_ngan`, `mo_ta_dai`, `thoi_gian`) VALUES
(157, 'Sam sung S25', 6, 0, 'Đẹp', '<p>Đẹp</p>', '2024-11-14 18:47:35'),
(158, 'Iphone 15 Pro Max', 21, 0, 'Đẹp', '<p><br></p>', '2024-11-15 03:31:53'),
(175, 'Sam sung S25', 6, 0, '', '<p><br></p>', '2024-11-17 09:35:46'),
(176, 'OPPO Reno12 5G 12G/512GB (Hồng) - Hàng Chính Hãng', 25, 0, '', '<p><br></p>', '2024-11-17 11:29:47'),
(177, 'Samsung Galaxy S24 FE 5G 8GB 128GB', 6, 0, '', '<p><br></p>', '2024-11-17 12:29:37'),
(178, 'Sam sung S25', 6, 0, '', '<p><br></p>', '2024-11-17 15:59:50'),
(179, 'Sam sung', 6, 0, '', '<p><br></p>', '2024-11-17 16:01:46'),
(180, 'Oppo', 25, 0, '', '<p><br></p>', '2024-11-17 16:02:07'),
(181, 'Iphone 15', 21, 0, '', '<p><br></p>', '2024-11-17 16:02:37'),
(182, 'Xiaomi 14T (12GB 512GB)', 22, 0, '', '<p><br></p>', '2024-11-18 09:50:18'),
(183, 'Vivo V30E 12GB 256GB', 26, 0, '', '<p><br></p>', '2024-11-18 09:52:02'),
(184, 'Samsung Galaxy S24 FE 5G 8GB 128GB', 6, 0, '', '<p><br></p>', '2024-11-18 09:54:32'),
(185, 'Iphone 20 Plus', 21, 0, '', '<p><br></p>', '2024-11-18 10:06:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham_yeu_thichs`
--

CREATE TABLE `san_pham_yeu_thichs` (
  `id` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `id_khach_hang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_nhan`
--

CREATE TABLE `tin_nhan` (
  `id` int NOT NULL,
  `id_nguoi_gui` int NOT NULL,
  `id_nguoi_nhan` int NOT NULL,
  `noi_dung` text NOT NULL,
  `trang_thai` varchar(50) DEFAULT NULL,
  `thoi_gian` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id_tin_tuc` int NOT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `tieu_de` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `trang_thai` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_xuat_ban` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`id_tin_tuc`, `anh`, `tieu_de`, `noi_dung`, `trang_thai`, `ngay_xuat_ban`) VALUES
(9, 'image/mu-1.jpg', 'Chấm điểm cầu thủ MU 1-1 Chelsea: Caicedo sáng nhấtChelsea đang có phong độ tốt trong khi MU Chelsea đang có phong độ tốt trong khi MU cũng tìm thấy sự hưng phấn dưới trướng HLV tạm quyền Ruud Van Nistelrooy. Chính vì thế, hai đội đã thi đấu khá cân tài cân sức và tỷ số 1-1 cũng phản ánh đúng cục diện của trận đấu.\r\n', '<p><strong>Cầu thủ chạy cánh của Chelsea, Jadon Sancho đã bị cựu tiền vệ Premier League Jamie O\'Hara cáo buộc quay lại với thói quen cũ của mình tại Man United.</strong></p><p><img src=\"https://cdn.bongdaplus.vn/Assets/Media/2024/11/21/77/sancho2.jpg\" alt=\"Sancho đang mất hút tại Chelsea\"></p><p>Sancho đang mất hút tại Chelsea</p><p>Sancho từng là một trong những cầu thủ tấn công đáng xem nhất thế giới khi còn khoác áo Dortmund. Sau đó, anh gia nhập Man United với giá 72 triệu bảng cách đây ba năm. Kể từ đó, cầu thủ này sa sút không phanh.</p><p><a href=\"https://bongdaplus.vn/tin-chuyen-nhuong-chelsea/sancho-roi-mu-gia-nhap-chelsea-theo-dang-cho-muon-4421452408.html\" target=\"_blank\">Chelsea đã đồng ý hợp đồng mượn kéo dài một mùa với Sancho</a>&nbsp;trong kỳ chuyển nhượng hè vừa qua. Trong hợp đồng có điều khoản The Blues sẽ phải mua đứt cầu thủ này với giá 25 triệu bảng nếu họ kết thúc trong top 14 tại Premier League 2024/25.</p><p>Sancho đã thi đấu tốt trong 3 lần ra sân đầu tiên cho The Blues trước Bournemouth, West Ham và Brighton. Anh đều có kiến tạo trong mỗi trận đấu này. Tuy nhiên, cầu thủ 24 tuổi đã không còn được chú ý sau 2 màn trình diễn đáng thất vọng trước Nottingham Forest và Liverpool.</p>', 'Hiển thị', '2024-11-06 08:01:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_hoa_don`
--

CREATE TABLE `trang_thai_hoa_don` (
  `id` int NOT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_hoa_don`
--

INSERT INTO `trang_thai_hoa_don` (`id`, `trang_thai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đang giao'),
(4, 'Đã giao'),
(5, 'Đã hoàn thành'),
(6, 'Đã thất bại'),
(7, 'Đã hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_binh_luan`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_san_pham_chi_tiet` (`id_san_pham_chi_tiet`);

--
-- Chỉ mục cho bảng `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk3` (`trang_thai_don_hang`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`id_hoa_don_chi_tiet`),
  ADD KEY `id_hoa_don` (`id_hoa_don`),
  ADD KEY `chi_tiet_san_pham` (`id_chi_tiet_san_pham`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_khach_hang`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`id_voucher`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- Chỉ mục cho bảng `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD PRIMARY KEY (`id_mau_sac`),
  ADD KEY `id_chi_tiet_san_pham` (`id_chi_tiet_san_pham`);

--
-- Chỉ mục cho bảng `phien_bans`
--
ALTER TABLE `phien_bans`
  ADD PRIMARY KEY (`id_phien_ban`),
  ADD KEY `id_chi_tiet_san_pham` (`id_chi_tiet_san_pham`);

--
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `id_danh_muc` (`id_danh_muc`);

--
-- Chỉ mục cho bảng `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khach_hang` (`id_khach_hang`),
  ADD KEY `id_san_pham` (`id_san_pham`);

--
-- Chỉ mục cho bảng `tin_nhan`
--
ALTER TABLE `tin_nhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tin_nhan_ibfk_1` (`id_nguoi_gui`),
  ADD KEY `tin_nhan_ibfk_2` (`id_nguoi_nhan`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id_tin_tuc`);

--
-- Chỉ mục cho bảng `trang_thai_hoa_don`
--
ALTER TABLE `trang_thai_hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_binh_luan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_danh_muc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT cho bảng `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT cho bảng `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `id_hoa_don_chi_tiet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_khach_hang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `id_voucher` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `mau_sacs`
--
ALTER TABLE `mau_sacs`
  MODIFY `id_mau_sac` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT cho bảng `phien_bans`
--
ALTER TABLE `phien_bans`
  MODIFY `id_phien_ban` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id_san_pham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT cho bảng `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tin_nhan`
--
ALTER TABLE `tin_nhan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id_tin_tuc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `trang_thai_hoa_don`
--
ALTER TABLE `trang_thai_hoa_don`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD CONSTRAINT `chi_tiet_san_pham_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id_san_pham`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD CONSTRAINT `danh_gias_ibfk_2` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `danh_gias_ibfk_3` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  ADD CONSTRAINT `hinh_anhs_ibfk_1` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`trang_thai_don_hang`) REFERENCES `trang_thai_hoa_don` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk8` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `admin_ibfk_26` FOREIGN KEY (`id_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`id_hoa_don`) REFERENCES `hoa_dons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD CONSTRAINT `fk_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id_danh_muc`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `mau_sacs`
--
ALTER TABLE `mau_sacs`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phien_bans`
--
ALTER TABLE `phien_bans`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_ibfk_1` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id_danh_muc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `san_pham_yeu_thichs_ibfk_1` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tin_nhan`
--
ALTER TABLE `tin_nhan`
  ADD CONSTRAINT `tin_nhan_ibfk_1` FOREIGN KEY (`id_nguoi_gui`) REFERENCES `khach_hang` (`id_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tin_nhan_ibfk_2` FOREIGN KEY (`id_nguoi_nhan`) REFERENCES `khach_hang` (`id_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
