<?php

class lien_he_client
{
    public $conn = null;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function hien_thi_tin_nhan($id_nguoi_gui, $id_nguoi_nhan)
    {
        $sql  = "SELECT * FROM tin_nhan 
                JOIN khach_hang ON  tin_nhan.id_nguoi_gui = khach_hang.id_khach_hang
                  WHERE (id_nguoi_gui = :id_nguoi_gui AND id_nguoi_nhan = :id_nguoi_nhan) 
                     OR (id_nguoi_gui = :id_nguoi_nhan AND id_nguoi_nhan = :id_nguoi_gui) 
                  ORDER BY thoi_gian";

        $result = $this->conn->prepare($sql);
        // Thực thi truy vấn và truyền giá trị cho các tham số
        $result->execute(['id_nguoi_gui' => $id_nguoi_gui, 'id_nguoi_nhan' => $id_nguoi_nhan]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inbox() //lay id  nguoi gui,  id nguoi nhan de in ra 
    {
        $sql  = "SELECT id_nguoi_gui, id_nguoi_nhan FROM tin_nhan";

        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function id_admin() //lay id  nguoi gui,  id nguoi nhan de in ra 
    {
        $sql  = "SELECT * FROM khach_hang  WHERE vai_tro = 'nhan vien'";

        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function tin_nhan_khach_hang($id_nguoi_nhan) //lay danh sach cac khach hang ib ho tro hien thi ra man chinh
    {
        $sql  = "SELECT tin_nhan.*, khach_hang.*
              FROM tin_nhan 
              JOIN khach_hang ON tin_nhan.id_nguoi_gui = khach_hang.id_khach_hang
              WHERE tin_nhan.id_nguoi_nhan = :id_nguoi_nhan 
              ORDER BY tin_nhan.thoi_gian DESC";

        $result = $this->conn->prepare($sql);
        $result->execute(['id_nguoi_nhan' => $id_nguoi_nhan]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_tin_tin($data)  //them tin nhan 
    {
        $sql = "INSERT INTO tin_nhan(id_nguoi_gui,id_nguoi_nhan,noi_dung) 
                VALUES(:id_nguoi_gui,:id_nguoi_nhan,:noi_dung) ";
        $result = $this->conn->prepare($sql);
        $result->execute($data);
    }

    public function noi_dung_hien_thi($id_nguoi_gui, $id_nguoi_nhan) //hien thi tin nhan
    {
        $sql = "SELECT * FROM tin_nhan
                WHERE (tin_nhan.id_nguoi_gui = $id_nguoi_gui AND tin_nhan.id_nguoi_nhan = $id_nguoi_nhan) 
                OR (tin_nhan.id_nguoi_gui = $id_nguoi_nhan AND tin_nhan.id_nguoi_nhan = $id_nguoi_gui)
                ORDER BY thoi_gian DESC LIMIT 1";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update_tn($data, $id_nguoi_gui, $id_nguoi_nhan)
    {
        $sql = "UPDATE tin_nhan AS t1
                JOIN (
                    SELECT id
                    FROM tin_nhan
                    WHERE id_nguoi_gui = $id_nguoi_gui AND id_nguoi_nhan = $id_nguoi_nhan OR id_nguoi_gui = $id_nguoi_nhan AND id_nguoi_nhan = $id_nguoi_gui 
                    ORDER BY thoi_gian DESC
                    LIMIT 1
                ) AS t2 ON t1.id = t2.id
                SET t1.trang_thai = :trang_thai;
                ";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }
}
