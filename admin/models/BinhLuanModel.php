<?php
class BinhLuan {
    public $conn = null;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getBinhLuanBySanPhamId($id_san_pham) {
        $sql = "SELECT bl.*, kh.ten_khach_hang 
                FROM binh_luan bl 
                JOIN khach_hang kh ON bl.id_khach_hang = kh.id 
                WHERE bl.id_san_pham = ? 
                ORDER BY bl.ngay_binh_luan ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_san_pham]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function themBinhLuan($id_khach_hang, $id_san_pham, $noi_dung) {
        $sql = "INSERT INTO binh_luan (id_khach_hang, id_san_pham, noi_dung, ngay_binh_luan, trang_thai) 
                VALUES (?, ?, ?, NOW(), 0)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_khach_hang, $id_san_pham, $noi_dung]);
    }
}