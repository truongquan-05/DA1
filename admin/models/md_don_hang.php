<?php

class Md_Hoa_Don
{
    public $conn = null;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function hoa_don_chi_tiet($id)
    {
        $sql = "SELECT * FROM hoa_don_chi_tiet 
                JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = hoa_don_chi_tiet.id_chi_tiet_san_pham  
                JOIN san_phams ON san_phams.id_san_pham = chi_tiet_san_pham.id_san_pham
                JOIN hinh_anhs ON hinh_anhs.id_san_pham  = san_phams.id_san_pham
                JOIN mau_sacs ON mau_sacs.id_chi_tiet_san_pham = chi_tiet_san_pham.id
                JOIN phien_bans ON phien_bans.id_chi_tiet_san_pham = chi_tiet_san_pham.id
                WHERE hoa_don_chi_tiet.id_hoa_don = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function find_hoa_don($id)
    {
        $sql = "SELECT *, 
                hoa_dons.so_dien_thoai AS std_nhan_hang, 
                hoa_dons.dia_chi AS dia_chi_nhan_hang 
                FROM hoa_dons 
                JOIN khach_hang ON khach_hang.id_khach_hang = hoa_dons.id_khach_hang 
                WHERE hoa_dons.id = $id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function all_hoa_don()
    {
        $sql = "SELECT *, trang_thai_hoa_don.id AS id_trang_thai, hoa_dons.id AS id_hoa_don 
        FROM hoa_dons 
        JOIN trang_thai_hoa_don ON hoa_dons.trang_thai_don_hang = trang_thai_hoa_don.id
        ORDER BY hoa_dons.id DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_don_hang($id){
        $sql = "DELETE FROM hoa_dons WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }


    //TRẠNG THÁI

    public function trang_thai_dh()
    {
        $sql = "SELECT * FROM trang_thai_hoa_don";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_tt($id,$tt_thanh_toan, $tt)
    {
        $sql = "UPDATE hoa_dons SET trang_thai_don_hang = $tt, trang_thai_thanh_toan = '$tt_thanh_toan' WHERE id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function find_tt($id)
    {
        $sql = "SELECT * FROM hoa_dons 
        JOIN trang_thai_hoa_don ON trang_thai_hoa_don.id = hoa_dons.trang_thai_don_hang 
        WHERE hoa_dons.id = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
