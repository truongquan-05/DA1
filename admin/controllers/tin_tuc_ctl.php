<?php

class Tin_tuc_ctl
{
    public function hien_thi_tin_tuc()
    {
        $data = (new tin_tuc())->list_news();
        view('tin_tuc/hien_thi', ['data' => $data]);
    }

    public function delete_tin_tuc()
    {
        $id = $_GET['id'];
        (new tin_tuc())->delete_news($id);
        echo "<script type='text/javascript'>
        window.location.href = 'index.php?act=tin_tuc';
    </script>";
    }

    public function add_tin_tuc()
    {
        view('tin_tuc/add');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if ($_POST['tieu_de'] != null) {

                $data = $_POST;
                $hinh_anhs = "";
                $file_anh = $_FILES['anh'];
                if ($file_anh['size'] > 0) {
                    $hinh_anhs = "image/" . $file_anh['name'];
                    move_uploaded_file($file_anh['tmp_name'], $hinh_anhs);
                }
                $data['anh'] = $hinh_anhs;

                (new tin_tuc())->create_news($data);
                echo "<script type='text/javascript'>
                        window.location.href = 'index.php?act=tin_tuc';
                        </script>";
            } else {
                echo "<script type='text/javascript'>
                
                er.innerText = 'Không được để trống';
              </script>";
            }
        }
    }
    public function edit_tin_tuc()
    {
        $id  = $_GET['id'];
        $data = (new tin_tuc())->find_one($id);
        view('tin_tuc/edit', ['data' => $data]);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['tieu_de'] && $_POST['noi_dung'] != "") {
                $du_lieu = $_POST;


                $hinh_anhs = "";
                $file_anh = $_FILES['anh'];
                if ($file_anh['size'] > 0) {
                    $hinh_anhs = "image/" . $file_anh['name'];
                    move_uploaded_file($file_anh['tmp_name'], $hinh_anhs);
                    $du_lieu['anh'] = $hinh_anhs;
                } else {
                    $du_lieu['anh'] = $data['anh'];
                }



                (new tin_tuc())->update_tin_tuc($id, $du_lieu);
                echo "<script type='text/javascript'>
            window.location.href = 'index.php?act=tin_tuc';
        </script>";
            } else {
                echo "<script type='text/javascript'>
                
                er.innerText = 'Không được để trống';
              </script>";
            }
        }
    }
}
