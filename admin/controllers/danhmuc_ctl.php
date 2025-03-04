<?php

class Danhmuc_ctl
{

    public function danh_muc()
    {
        $data = (new DanhMuc())->all();
        view("danhmuc", ['data' => $data]);
    }

    public function add_danh_muc()
    {
        view("add_danh_muc");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['name'] != null) {
                $data = $_POST;
                (new DanhMuc())->create($data);
                echo "<script type='text/javascript'>
                        window.location.href = 'index.php?act=danhmuc';
                    </script>";
            } else {
                echo "<script type='text/javascript'>
                var er = document.getElementById('error');
                er.innerText = 'Không được để trống';
              </script>";
            }
        }
    }
    public function delete_dm()
    {
        $id = $_GET['id'];
        (new DanhMuc())->delete($id);
        header("location:index.php?act=danhmuc");
    }
    public function update_dm()
    {

        $id = $_GET['id'];
        $data = (new DanhMuc())->find($id);
        view('update_dm', ['data' => $data]);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['name'] != null) {
                $du_lieu = $_POST;
                echo "<script type='text/javascript'>
                alert('Thanh cong')
              </script>";
                (new DanhMuc())->update($id, $du_lieu);
                echo "<script type='text/javascript'>
                        window.location.href = 'index.php?act=danhmuc';
                    </script>";
            } else {
                echo "<script type='text/javascript'>
                var er = document.getElementById('error');
                er.innerText = 'Không được để trống';
              </script>";
            }
        }
    }
}
