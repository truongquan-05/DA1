<?php
class Md_san_pham
{
    public $conn = null;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function show_san_pham()
    {
        $sql = "SELECT san_phams.*, chi_tiet_san_pham.*, hinh_anhs.*
                FROM san_phams
                JOIN (
                    SELECT id_san_pham, MAX(id) AS id_chi_tiet
                    FROM chi_tiet_san_pham
                    GROUP BY id_san_pham
                ) AS id_ct__ ON san_phams.id_san_pham = id_ct__.id_san_pham
                JOIN chi_tiet_san_pham ON san_phams.id_san_pham = chi_tiet_san_pham.id_san_pham 
                    AND chi_tiet_san_pham.id = id_ct__.id_chi_tiet
                JOIN (
                    SELECT id_san_pham, MIN(id) AS id_cu_nhat
                    FROM hinh_anhs
                    GROUP BY id_san_pham
                ) AS hinh_anh_cu ON san_phams.id_san_pham = hinh_anh_cu.id_san_pham
                JOIN hinh_anhs ON san_phams.id_san_pham = hinh_anhs.id_san_pham
                    AND hinh_anhs.id = hinh_anh_cu.id_cu_nhat
                ORDER BY san_phams.id_san_pham DESC
                LIMIT 12;
                ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show_all_san_pham($offset)
    {
        $sql = "SELECT san_phams.*, chi_tiet_san_pham.*, hinh_anhs.* 
                FROM san_phams
                JOIN (
                    SELECT id_san_pham, MAX(id) AS id_chi_tiet
                    FROM chi_tiet_san_pham
                    GROUP BY id_san_pham
                ) AS id_ct__ ON san_phams.id_san_pham = id_ct__.id_san_pham
                JOIN chi_tiet_san_pham ON san_phams.id_san_pham = chi_tiet_san_pham.id_san_pham 
                    AND chi_tiet_san_pham.id = id_ct__.id_chi_tiet
                JOIN (
                    SELECT id_san_pham, MIN(id) AS id_cu_nhat
                    FROM hinh_anhs
                    GROUP BY id_san_pham
                ) AS hinh_anh_cu ON san_phams.id_san_pham = hinh_anh_cu.id_san_pham
                JOIN hinh_anhs ON san_phams.id_san_pham = hinh_anhs.id_san_pham
                    AND hinh_anhs.id = hinh_anh_cu.id_cu_nhat
                ORDER BY san_phams.id_san_pham DESC LIMIT 16 OFFSET $offset";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count_SanPham()
    {
        $sql = "SELECT COUNT(id_san_pham) FROM san_phams ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function show_san_pham_min($by, $offset)
    {
        $sql = "SELECT san_phams.*, chi_tiet_san_pham.*, hinh_anhs.* 
                FROM san_phams
                JOIN (
                    SELECT id_san_pham, MAX(id) AS id_chi_tiet
                    FROM chi_tiet_san_pham
                    GROUP BY id_san_pham
                ) AS id_ct__ ON san_phams.id_san_pham = id_ct__.id_san_pham
                JOIN chi_tiet_san_pham ON san_phams.id_san_pham = chi_tiet_san_pham.id_san_pham 
                    AND chi_tiet_san_pham.id = id_ct__.id_chi_tiet
                JOIN (
                    SELECT id_san_pham, MIN(id) AS id_cu_nhat  
                    FROM hinh_anhs
                    GROUP BY id_san_pham
                ) AS hinh_anh_cu ON san_phams.id_san_pham = hinh_anh_cu.id_san_pham
                JOIN hinh_anhs ON san_phams.id_san_pham = hinh_anhs.id_san_pham
                    AND hinh_anhs.id = hinh_anh_cu.id_cu_nhat
                ORDER BY gia_ban $by LIMIT 16 OFFSET $offset  ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }



    public function show_san_pham_danh_muc($by, $offset)
    {
        $sql = "SELECT san_phams.*, chi_tiet_san_pham.*, hinh_anhs.* 
                FROM san_phams
                JOIN danh_muc ON san_phams.id_danh_muc = danh_muc.id_danh_muc 
                JOIN (
                    SELECT id_san_pham, MAX(id) AS id_chi_tiet
                    FROM chi_tiet_san_pham
                    GROUP BY id_san_pham
                ) AS id_ct__ ON san_phams.id_san_pham = id_ct__.id_san_pham
                JOIN chi_tiet_san_pham ON san_phams.id_san_pham = chi_tiet_san_pham.id_san_pham 
                    AND chi_tiet_san_pham.id = id_ct__.id_chi_tiet
                JOIN (
                    SELECT id_san_pham, MIN(id) AS id_cu_nhat
                    FROM hinh_anhs
                    GROUP BY id_san_pham
                ) AS hinh_anh_cu ON san_phams.id_san_pham = hinh_anh_cu.id_san_pham
                JOIN hinh_anhs ON san_phams.id_san_pham = hinh_anhs.id_san_pham
                    AND hinh_anhs.id = hinh_anh_cu.id_cu_nhat
                WHERE ten_danh_muc = '$by' LIMIT 16 OFFSET $offset  ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    public function san_pham_chi_tiet($id)
    {
        $sql = "SELECT * FROM san_phams
            JOIN danh_muc ON san_phams.id_danh_muc = danh_muc.id_danh_muc 
            WHERE id_san_pham = $id AND danh_muc.trang_thai = 'Hiển thị' ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function bien_the_san_pham($id)
    {
        $sql = "SELECT * FROM chi_tiet_san_pham
        JOIN mau_sacs ON mau_sacs.id_chi_tiet_san_pham  = chi_tiet_san_pham.id  
        JOIN phien_bans ON phien_bans.id_chi_tiet_san_pham  = chi_tiet_san_pham.id  
        WHERE id_san_pham = $id ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function hinh_anh($id)
    {
        $sql = "SELECT * FROM hinh_anhs WHERE id_san_pham  = $id ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_binh_luan_by_san_pham_id($id, $offset)
    {
        $sql = "SELECT binh_luan.*, 
                   khach_hang.tens, 
                   khach_hang.anh_dai_dien
            FROM binh_luan 
            JOIN khach_hang ON binh_luan.id_khach_hang = khach_hang.id_khach_hang 
            WHERE binh_luan.id_san_pham = :id_san_pham 
            ORDER BY binh_luan.ngay_binh_luan DESC LIMIT 5 OFFSET $offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_san_pham', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_danh_gia_by_san_pham_id($id)
    {
        $sql = "SELECT danh_gias.*, khach_hang.tens,khach_hang.anh_dai_dien
            FROM danh_gias 
            JOIN khach_hang ON danh_gias.id_khach_hang = khach_hang.id_khach_hang 
            WHERE danh_gias.id_san_pham = :id_san_pham 
            ORDER BY danh_gias.noi_dung DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_san_pham', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function count_binh_luan_by_san_pham_id($id)
    {
        $sql = "SELECT COUNT(*) as total_binh_luan 
            FROM binh_luan 
            WHERE id_san_pham = :id_san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_san_pham', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_binh_luan'];
    }

    //THÊM ĐÁNH GIÁ 
    public function add_danh_gia($id_san_pham, $id_khach_hang, $diem_danh_gia, $noi_dung, $id_hdct)
    {
        $sql = "INSERT INTO danh_gias (id_san_pham, id_khach_hang, diem_danh_gia, noi_dung, id_hdct) VALUES (:id_san_pham, :id_khach_hang, :diem_danh_gia, :noi_dung ,:id_hdct)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_san_pham', $id_san_pham);
        $stmt->bindParam(':id_khach_hang', $id_khach_hang);
        $stmt->bindParam(':diem_danh_gia', $diem_danh_gia);
        $stmt->bindParam(':noi_dung', $noi_dung);
        $stmt->bindParam(':id_hdct', $id_hdct);
        return $stmt->execute();
    }
    public function update_sl_sp($id, $so_luong)
    {
        $sql = "UPDATE chi_tiet_san_pham SET so_luong = $so_luong WHERE id  = $id ";
        $result = $this->conn->prepare($sql);
        $result->execute();
    }
    public function find_onespct($id)
    {
        $sql = "SELECT * FROM chi_tiet_san_pham
        WHERE id = $id";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
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
}
