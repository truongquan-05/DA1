<?php

class trangthais{
    public $conn=null;
    public function __construct(){
        $this->conn=connectDB();
    }
    public function all(){
        $sql="SELECT*FROM trang_thai_hoa_don ORDER BY id DESC";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public function delete($id) {
        $sql = "DELETE FROM trang_thai_hoa_don WHERE id =$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

    }
    public function insert($data){
        $sql="INSERT INTO trang_thai_hoa_don(trang_thai) VALUES (:trang_thai)";
        $stmt= $this->conn->prepare($sql);
      
        $stmt->execute($data);
       
   
    
    }
    public function update($data){
        $sql= "UPDATE trang_thai_hoa_don SET trang_thai=:trang_thai WHERE id=:id";
        $stmt= $this ->conn->prepare($sql);
        $stmt->execute($data);
    }
    public function find_one($id){
        $sql="SELECT*FROM trang_thai_hoa_don WHERE id=$id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
       }



}

