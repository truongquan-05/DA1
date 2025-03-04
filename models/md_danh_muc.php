<?php
class Md_danh_muc
{
    public $conn = null;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function all()
    {
        $sql = "SELECT * FROM danh_muc WHERE trang_thai = 'Hiển thị'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function banner(){
        $sql = "SELECT * FROM banner ORDER BY id_banner";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}
