<?php
class KhachHang
{
    private $conn = null;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function all()
    {
        try {
            $sql = "SELECT * FROM khach_hang";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in all(): " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM khach_hang WHERE id_khach_hang = :id_khach_hang";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute(['id_khach_hang' => $id]);
        } catch (PDOException $e) {
            error_log("Error in delete(): " . $e->getMessage());
            return false;
        }
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

    public function create($data)
    {
        try {
            $sql = "INSERT INTO khach_hang (tens, anh_dai_dien, email, mat_khau, so_dien_thoai, ngay_sinh, dia_chi, vai_tro) VALUES (:tens, :anh_dai_dien, :email, :mat_khau, :so_dien_thoai, :ngay_sinh, :dia_chi, :vai_tro)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            error_log("Error in create(): " . $e->getMessage());
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $sql = "UPDATE khach_hang SET tens = :tens, anh_dai_dien = :anh_dai_dien, email = :email, so_dien_thoai = :so_dien_thoai, ngay_sinh = :ngay_sinh, dia_chi = :dia_chi WHERE id_khach_hang = :id_khach_hang";
            $data['id_khach_hang'] = $id;
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            error_log("Error in update(): " . $e->getMessage());
            return false;
        }
    }

    // Alias for create function
    public function dang_ky($data)
    {
        return $this->create($data);
    }
    public function checkEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM khach_hang WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function checkPhoneExists($phone)
    {
        $sql = "SELECT COUNT(*) FROM khach_hang WHERE so_dien_thoai = :phone";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
