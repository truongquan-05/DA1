<?php
class tin_tuc
{
    public $conn = null;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function list_news()
    {
        $sql = "SELECT * FROM tin_tuc ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_news_by_id($id)
    {
        $sql = "SELECT * FROM tin_tuc WHERE id_tin_tuc = :id AND trang_thai = 'Hiển thị'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}