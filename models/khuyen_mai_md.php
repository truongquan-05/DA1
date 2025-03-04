<?php
class khuyenmais{
    public $conn=null;
    public function __construct(){
        $this->conn=connectDB();
    }
    public function all(){
        $sql="SELECT*FROM khuyen_mai 
        JOIN danh_muc ON khuyen_mai.id_danh_muc = danh_muc.id_danh_muc ORDER BY id_voucher DESC";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}