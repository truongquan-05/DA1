<?php
class TaiKhoan
{
    public $conn = null;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function find($id)
    {
        try {
            $sql = "SELECT * FROM khach_hang WHERE id_khach_hang = :id_khach_hang";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id_khach_hang' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in find(): " . $e->getMessage());
            return false;
        }
    }
    public function update($id, $data)
    {
        try {
            $sql = "UPDATE khach_hang SET tens = :tens, anh_dai_dien = :anh_dai_dien, email = :email, so_dien_thoai = :so_dien_thoai, dia_chi = :dia_chi WHERE id_khach_hang = :id_khach_hang";
            $data['id_khach_hang'] = $id;
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            error_log("Error in update(): " . $e->getMessage());
            return false;
        }
    }
    public function update_mat_khau($id, $data)
    {

        $sql = "UPDATE khach_hang SET mat_khau =  '$data' WHERE id_khach_hang = $id";

        $result = $this->conn->prepare($sql);
        $result->execute();
        
    }
}
