<?php

class Thongkes
{
    private $conn;

    public function __construct()
    {

        $this->conn = connectDB();
    }

    public function all()
    {
        $sql = " SELECT COUNT(*) FROM hoa_dons WHERE trang_thai_don_hang NOT IN (5, 6, 7,8)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function dh_da_hoan_thanh()
    {
        $sql = " SELECT COUNT(*) FROM hoa_dons WHERE trang_thai_don_hang = 5";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function thong_ke_doanh_thu()
    {
        $sql = "SELECT * FROM hoa_don_chi_tiet 
        JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id  = hoa_don_chi_tiet.id_chi_tiet_san_pham 
        JOIN  hoa_dons ON hoa_dons.id = hoa_don_chi_tiet.id_hoa_don WHERE hoa_dons.trang_thai_don_hang = 5 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function date()
    {
        $sql = "SELECT DISTINCT DATE(hoa_dons.ngay_dat) AS data_date FROM hoa_don_chi_tiet 
        JOIN  hoa_dons ON hoa_dons.id = hoa_don_chi_tiet.id_hoa_don WHERE hoa_dons.trang_thai_don_hang = 5 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function doanh_thu_ngay($data)
    {
        $sql = "SELECT so_luong_mua*gia_nhap AS von,thanh_tien  FROM hoa_don_chi_tiet 
        JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id  = hoa_don_chi_tiet.id_chi_tiet_san_pham 
        JOIN  hoa_dons ON hoa_dons.id = hoa_don_chi_tiet.id_hoa_don WHERE hoa_dons.trang_thai_don_hang = 5 AND DATE(hoa_dons.ngay_dat) = '$data'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function thong_ke_so_luong_san_pham()
    {
        $sql = "SELECT * FROM chi_tiet_san_pham ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
