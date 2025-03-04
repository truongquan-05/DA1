<?php
class BinhLuan
{
    public $conn = null;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function themBinhLuan($id_khach_hang, $id_san_pham, $noi_dung)
    {
        $sql = "INSERT INTO binh_luan (id_khach_hang, id_san_pham, noi_dung, ngay_binh_luan, trang_thai) 
                VALUES (?, ?, ?, NOW(), 0)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id_khach_hang, $id_san_pham, $noi_dung]);
    }
   
    
}
