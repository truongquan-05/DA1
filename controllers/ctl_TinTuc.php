<?php

class TinTuc
{
    public function tin_tuc()
    {
        $danh_muc = (new Md_danh_muc())->all();
        $data = (new tin_tuc())->list_news();

        view("TinTuc/HienThi", ['danh_muc' => $danh_muc, 'data' => $data]);
    }
    public function chi_tiettin_tuc()
    {
        // Kiểm tra xem id có được truyền vào qua URL hay không và nó có phải là số không
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];  // Lấy giá trị ID từ URL

            // Lấy chi tiết tin tức dựa trên id
            $newsModel = new tin_tuc();
            $chitiet = $newsModel->get_news_by_id($id); // Lấy chi tiết tin tức từ model

            if ($chitiet) {
                // Lấy danh mục tin tức từ model (nếu cần)
                $danh_muc = (new Md_danh_muc())->all();

                // Chuyển dữ liệu đến view
                view("TinTuc/ChiTiet", [
                    'chitiet' => $chitiet,
                    'danh_muc' => $danh_muc
                ]);
            }
        }else{
            (new HomeController)->error();
        }
    }
}
