<?php
class Md_Gio_Hang
{
    public $conn = null;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function add_gio_hang($data)
    {
        $sql = "INSERT INTO gio_hang (id_khach_hang , id_san_pham_chi_tiet, so_luong ) VALUES (:id_khach_hang, :id_san_pham_chi_tiet,:so_luong)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function update_gio_hang($id, $id_khach_hang, $so_luong)
    {
        $sql = "UPDATE gio_hang SET so_luong = $so_luong WHERE id_san_pham_chi_tiet = $id AND id_khach_hang = $id_khach_hang";
        $result = $this->conn->prepare($sql);
        $result->execute();
    }
    public function delete($id, $id_khach_hang)
    {
        $sql = "DELETE FROM gio_hang WHERE id_san_pham_chi_tiet = $id AND id_khach_hang = $id_khach_hang";
        $result = $this->conn->prepare($sql);
        $result->execute();
    }

    public function find_all($id_khach_hang)
    {
        $sql = "SELECT *, gio_hang.so_luong AS so_luong_mua, hinh_anh.id AS id_hinh_anh FROM gio_hang
        JOIN chi_tiet_san_pham ON gio_hang.id_san_pham_chi_tiet = chi_tiet_san_pham.id
        JOIN mau_sacs ON chi_tiet_san_pham.id = mau_sacs.id_chi_tiet_san_pham
        JOIN san_phams ON chi_tiet_san_pham.id_san_pham = san_phams.id_san_pham
        JOIN phien_bans ON chi_tiet_san_pham.id = phien_bans.id_chi_tiet_san_pham
        JOIN 
            ( SELECT * FROM hinh_anhs
                    WHERE id IN (
                        SELECT MIN(id) 
                        FROM hinh_anhs
                        GROUP BY id_san_pham
                    )
            ) AS hinh_anh ON hinh_anh.id_san_pham  = san_phams.id_san_pham  

        WHERE id_khach_hang  = $id_khach_hang
        ORDER BY gio_hang.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function khach_hang($id_khach_hang)
    {
        $sql = "SELECT * FROM khach_hang
                WHERE id_khach_hang = $id_khach_hang";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function don_hang($id_khach_hang, $id_san_pham)
    {
        $sql = "SELECT *, gio_hang.so_luong AS so_luong_mua, hinh_anh.id AS id_hinh_anh FROM gio_hang
        JOIN chi_tiet_san_pham ON gio_hang.id_san_pham_chi_tiet = chi_tiet_san_pham.id
        JOIN mau_sacs ON chi_tiet_san_pham.id = mau_sacs.id_chi_tiet_san_pham
        JOIN san_phams ON chi_tiet_san_pham.id_san_pham = san_phams.id_san_pham
        JOIN phien_bans ON chi_tiet_san_pham.id = phien_bans.id_chi_tiet_san_pham
        JOIN 
            ( SELECT * FROM hinh_anhs
                    WHERE id IN (
                        SELECT MIN(id) 
                        FROM hinh_anhs
                        GROUP BY id_san_pham
                    )
            ) AS hinh_anh ON hinh_anh.id_san_pham  = san_phams.id_san_pham  

        WHERE id_khach_hang  = $id_khach_hang AND chi_tiet_san_pham.id = $id_san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function don_hang__one($id_san_pham)
    {
        $sql = "SELECT *, hinh_anh.id AS id_hinh_anh FROM chi_tiet_san_pham
        JOIN mau_sacs ON chi_tiet_san_pham.id = mau_sacs.id_chi_tiet_san_pham
        JOIN san_phams ON chi_tiet_san_pham.id_san_pham = san_phams.id_san_pham
        JOIN phien_bans ON chi_tiet_san_pham.id = phien_bans.id_chi_tiet_san_pham
        JOIN 
            ( SELECT * FROM hinh_anhs
                    WHERE id IN (
                        SELECT MIN(id) 
                        FROM hinh_anhs
                        GROUP BY id_san_pham
                    )
            ) AS hinh_anh ON hinh_anh.id_san_pham  = san_phams.id_san_pham  

        WHERE chi_tiet_san_pham.id = $id_san_pham";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function voucher()
    {
        $sql = "SELECT * FROM khuyen_mai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function insert_hoa_don($data)
    {
        $sql = "INSERT INTO hoa_dons 
                (ten_nguoi_nhan, email_nguoi_nhan,so_dien_thoai,dia_chi,khuyen_mai,ghi_chu,phuong_thuc_thanh_toan,tong_tien,trang_thai_thanh_toan,thanh_toan,ma_don_hang,id_khach_hang,trang_thai_don_hang ) 
                VALUES 
                (:ten_nguoi_nhan,:email_nguoi_nhan, :so_dien_thoai,:dia_chi,:khuyen_mai,:ghi_chu,:payUrl,:tong_tien,:trang_thai_thanh_toan,:thanh_toan,:ma_don_hang,:id_khach_hang,:trang_thai_don_hang)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function insert_hoa_don_ct($data)
    {
        $sql = "INSERT INTO hoa_don_chi_tiet 
                (id_hoa_don , so_luong_mua,don_gia,thanh_tien,id_chi_tiet_san_pham  ) 
                VALUES 
                (:id_hoa_don ,:so_luong_mua, :don_gia,:thanh_tien,:id_chi_tiet_san_pham )";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }


    public function hd()
    {
        $sql = "SELECT * FROM hoa_dons 
        ORDER BY id DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function don_hang__all($id)
    {
        $sql = "SELECT 
                    ma_don_hang,
                    MIN(hoa_dons.id) AS id_hoa_don,
                    id_khach_hang,
                    MIN(ngay_dat) AS ngay_dat,
                    MIN(trang_thai_don_hang) AS trang_thai_don_hang,
                    MIN(trang_thai_thanh_toan) AS trang_thai_thanh_toan,
                    MIN(phuong_thuc_thanh_toan) AS phuong_thuc_thanh_toan,
                    MIN(trang_thai) AS trang_thai
                FROM hoa_dons
                    JOIN trang_thai_hoa_don ON trang_thai_hoa_don.id = hoa_dons.trang_thai_don_hang 
                    WHERE id_khach_hang  = $id
                    GROUP BY ma_don_hang
                    ORDER BY id_hoa_don DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function don_hang__($id)
    {
        $sql = "SELECT *, hoa_dons.id AS id_hoa_don FROM hoa_dons
        JOIN trang_thai_hoa_don ON trang_thai_hoa_don.id = hoa_dons.trang_thai_don_hang 
        WHERE hoa_dons.id  = $id ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function hoa_don_chi_tiet($id)
    {
        $sql = "SELECT 
                    MIN(id_hoa_don_chi_tiet) AS id_hoa_don_chi_tiet,
                    MIN(id_hoa_don) AS id_hoa_don,
                    MIN(so_luong_mua) AS so_luong_mua,
                    MIN(gia_ban) AS gia_ban,
                    MIN(mau_sac) AS mau_sac,
                    MIN(phien_ban) AS phien_ban,
                    MIN(hinh_anh) AS hinh_anh,
                    MIN(ten_san_pham) AS ten_san_pham,
                    MIN(san_phams.id_san_pham) AS id_san_pham,
                    MIN(chi_tiet_san_pham.id) AS id_chi_tiet_san_pham

        
           FROM hoa_don_chi_tiet 
                JOIN chi_tiet_san_pham ON chi_tiet_san_pham.id = hoa_don_chi_tiet.id_chi_tiet_san_pham  
                JOIN hoa_dons ON hoa_dons.id = hoa_don_chi_tiet.id_hoa_don 
                JOIN san_phams ON san_phams.id_san_pham = chi_tiet_san_pham.id_san_pham

                JOIN hinh_anhs ON hinh_anhs.id_san_pham  = san_phams.id_san_pham
                
                JOIN mau_sacs ON mau_sacs.id_chi_tiet_san_pham = chi_tiet_san_pham.id
                JOIN phien_bans ON phien_bans.id_chi_tiet_san_pham = chi_tiet_san_pham.id

                
                WHERE hoa_don_chi_tiet.id_hoa_don = $id
                
              GROUP BY id_hoa_don_chi_tiet
                
                ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function danh_gias_one()
    {
        $sql = "SELECT * FROM danh_gias";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update_HD($trang_thai_don_hang, $id, $trang_thai_thanh_toan)
    {
        $sql = " UPDATE hoa_dons SET trang_thai_don_hang = $trang_thai_don_hang, trang_thai_thanh_toan = '$trang_thai_thanh_toan' WHERE id = $id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }



    public function yeu_thich($id, $acc)
    {
        $sql = "INSERT INTO san_pham_yeu_thichs
                (id_san_pham , id_khach_hang ) VALUES ($id ,$acc )";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }


    public function find_all_yeu_thich($id_khach_hang)
    {
        $sql = "SELECT *, hinh_anh.id AS id_hinh_anh FROM san_pham_yeu_thichs
        JOIN san_phams ON san_pham_yeu_thichs.id_san_pham = san_phams.id_san_pham
        JOIN 
            ( SELECT * FROM hinh_anhs
                    WHERE id IN (
                        SELECT MIN(id) 
                        FROM hinh_anhs
                        GROUP BY id_san_pham
                    )
            ) AS hinh_anh ON hinh_anh.id_san_pham  = san_phams.id_san_pham  

        WHERE id_khach_hang  = $id_khach_hang 
        ORDER BY san_pham_yeu_thichs.id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete_YT($id, $id_khach_hang)
    {
        $sql = "DELETE FROM san_pham_yeu_thichs WHERE id_san_pham  = $id AND id_khach_hang  = $id_khach_hang";
        $result = $this->conn->prepare($sql);
        $result->execute();
    }
}
