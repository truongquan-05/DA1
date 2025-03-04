<?php

class khuyenmaicontroller
{


    public function khuyenmai()
    {
        $khuyenmai = (new khuyenmais())->all(); // Giả sử class khuyenmais đã được định nghĩa

        views("khuyen_mai", ['khuyenmai' => $khuyenmai]); // Truyền dữ liệu $banner vào view banner.php
    }

    public function deletel()
    {
        $id = $_GET['id'];



        (new khuyenmais())->deletel($id);

        header("Location: index.php?act=khuyen_mai");
        exit();
    }


    public function voucher()
    {
        $data = $_POST;

        $hinh_anh = "";
        $file_anh = $_FILES['hinh_anh'];
        if ($file_anh['size'] > 0) {
            $hinh_anh = "image/" . $file_anh['name'];
            move_uploaded_file($file_anh['tmp_name'], $hinh_anh);
        }
        $data['hinh_anh'] = $hinh_anh;

        (new khuyenmais())->insert($data);
        header("Location: index.php?act=khuyen_mai");
    }
    public function add()
    {
        //Lấy danh mục
        $danhmuc = (new DanhMuc)->all();
        //gọi view
        views("add_khuyenmai", ['danhmuc' => $danhmuc]);
    }
    public function updatekm()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            if ($data['voucher'] <= 100) {
                $file_anh = $_FILES["hinh_anh"];
                if ($file_anh["size"] > 0) {
                    $hinh_anh = "image/" . $file_anh['name'];
                    $data['hinh_anh'] = $hinh_anh;
                    move_uploaded_file($file_anh['tmp_name'], $hinh_anh);
                }
                (new khuyenmais())->updatekm($data);
                header("Location: index.php?act=khuyen_mai");
            }
            else{
                echo "<script type='text/javascript'>
                alert('Voucher không được vượt quá 100%');
           </script>";
            }
        }
        $danhmuc = (new DanhMuc)->all();
        $id = $_GET['id'];
        $khuyenmai = (new khuyenmais())->find_one($id);
        views("updatekm", ['khuyenmai' => $khuyenmai, 'danhmuc' => $danhmuc]);
    }
}
