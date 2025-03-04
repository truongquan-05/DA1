<?php

class DanhMuc
{
    public $conn = null;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function all()
    {
        $sql = "SELECT * FROM danh_muc ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM danh_muc WHERE id_danh_muc = :id_danh_muc";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id_danh_muc' => $id]);
    }

    public function create($data)
    {
        $sql = "INSERT INTO danh_muc (ten_danh_muc, trang_thai) VALUES (:ten_danh_muc, :trang_thai)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['ten_danh_muc'=>$data['name'], 'trang_thai'=>$data['trang_thai']]);
    }
    public function find($id) {
        $sql = "SELECT * FROM danh_muc WHERE id_danh_muc = :id_danh_muc";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id_danh_muc' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id, $data) {
        $sql = "UPDATE danh_muc SET ten_danh_muc = :ten_danh_muc, trang_thai= :trang_thai WHERE id_danh_muc = :id_danh_muc";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['ten_danh_muc' => $data['name'],'trang_thai' => $data['trang_thai'], 'id_danh_muc' => $id]);
    }
}
