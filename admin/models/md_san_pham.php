<?php

class Md_san_pham
{
    public $conn = null;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function show()
    {
        $sql = "SELECT * FROM san_phams
            JOIN danh_muc ON san_phams.id_danh_muc = danh_muc.id_danh_muc 
            JOIN chi_tiet_san_pham ON san_phams.id_san_pham = chi_tiet_san_pham.id_san_pham 
            ORDER BY san_phams.id_san_pham DESC";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function show_anh()
    {
        $sql = "SELECT * FROM hinh_anhs
            JOIN san_phams ON san_phams.id_san_pham  = hinh_anhs.id_san_pham  ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function show_anh_san_pham($id)
    {
        $sql = "SELECT * FROM hinh_anhs
            WHERE id_san_pham = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function creat_san_pham($data)
    {
        $sql = "INSERT INTO san_phams (ten_san_pham, mo_ta_ngan, mo_ta_dai, id_danh_muc, luot_xem) 
                VALUES(:ten_san_pham, :mo_ta_ngan, :mo_ta_dai, :id_danh_muc, :luot_xem)";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }
    public function find_one($id)
    {
        $sql = "SELECT * FROM san_phams
        JOIN danh_muc ON san_phams.id_danh_muc = danh_muc.id_danh_muc 
        WHERE id_san_pham = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function creat_hinh_anh($data)
    {
        $sql = "INSERT INTO hinh_anhs (id_san_pham, hinh_anh) 
        VALUES(:id_san_pham, :hinh_anh)";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }
    public function update_hinh_anh($data)
    {
        $sql = "UPDATE hinh_anhs SET  hinh_anh = :hinh_anh WHERE id  = :id ";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }
    public function creat_chi_tiet_san_pham($data)
    {
        $sql = "INSERT INTO chi_tiet_san_pham (gia_ban,gia_nhap, so_luong, id_san_pham) 
                VALUES(:gia_ban,:gia_nhap, :so_luong, :id_san_pham)";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }

    public function creat_mau_sac($data)
    {
        $sql = "INSERT INTO mau_sacs (id_chi_tiet_san_pham , mau_sac) 
                VALUES(:id_chi_tiet_san_pham , :mau_sac)";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }

    public function creat_phien_ban($data)
    {
        $sql = "INSERT INTO phien_bans (id_chi_tiet_san_pham , phien_ban) 
                VALUES(:id_chi_tiet_san_pham , :phien_ban)";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }

    public function update_sanpham($id, $data)
    {
        $sql = "UPDATE san_phams SET ten_san_pham = :ten_san_pham, id_danh_muc= :id_danh_muc, mo_ta_ngan= :mo_ta_ngan, mo_ta_dai = :mo_ta_dai WHERE id_san_pham = $id";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }
    public function update_san_pham_chi_tiet($id, $data)
    {
        $sql = "UPDATE chi_tiet_san_pham SET so_luong = :so_luong, gia_ban= :gia_ban, gia_nhap= :gia_nhap WHERE  id = $id";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }
    public function update_phien_ban($id, $data)
    {
        $sql = "UPDATE phien_bans SET phien_ban = :phien_ban WHERE id_chi_tiet_san_pham  = $id";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }

    public function update_mau_sac($id, $data)
    {
        $sql = "UPDATE mau_sacs SET mau_sac = :mau_sac WHERE id_chi_tiet_san_pham  = $id";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }

    public function find_one_time()
    {
        $sql = "SELECT * FROM san_phams
        ORDER BY id_san_pham  DESC";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function find_one_time_chi_tiet()
    {
        $sql = "SELECT * FROM chi_tiet_san_pham
        ORDER BY id  DESC";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function find_one_sp_chi_tiet($id)
    {
        $sql = "SELECT * FROM chi_tiet_san_pham
        WHERE id_san_pham  = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find_CTSP($id)
    {
        $sql = "SELECT * FROM chi_tiet_san_pham
        WHERE id = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function update_SL_SPCT($id, $data)
    {
        $sql = "UPDATE chi_tiet_san_pham SET so_luong = $data WHERE  id = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
    }

    public function find_one_phien_ban($id)
    {
        $sql = "SELECT * FROM phien_bans
        WHERE id_chi_tiet_san_pham   = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find_one_mau_sac($id)
    {
        $sql = "SELECT * FROM mau_sacs
        WHERE id_chi_tiet_san_pham   = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    public function delete_san_pham($id)
    {
        $sql = "DELETE FROM san_phams WHERE id_san_pham  = $id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute();
    }


    public function get_binh_luan_by_san_pham_id($id)
    {
        $sql = "SELECT binh_luan.*, khach_hang.tens 
                FROM binh_luan 
                JOIN khach_hang ON binh_luan.id_khach_hang = khach_hang.id_khach_hang 
                WHERE binh_luan.id_san_pham = :id_san_pham 
                ORDER BY binh_luan.ngay_binh_luan DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_san_pham', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_danh_gia_by_san_pham_id($id)
    {
        $sql = "SELECT danh_gias.*, khach_hang.tens
            FROM danh_gias 
            JOIN khach_hang ON danh_gias.id_khach_hang = khach_hang.id_khach_hang 
            WHERE danh_gias.id_san_pham = :id_san_pham 
            ORDER BY danh_gias.noi_dung DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_san_pham', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function count_sp($id)
    {
        $sql = " SELECT COUNT(*) FROM chi_tiet_san_pham WHERE id_san_pham = $id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }






}
