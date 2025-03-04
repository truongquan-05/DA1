    <?php

    class bannercontroller
    {


        public function banner()
        {
            $banner = (new banners())->all(); // Giả sử class banners đã được định nghĩa

            views("banner", ['banner' => $banner]); // Truyền dữ liệu $banner vào view banner.php
        }

        public function delete()
        {
            $id = $_GET['id'];
            $data = (new banners())->find_one($id);
            if (file_exists($data['hinh_anhs'])) {
                unlink($data['hinh_anhs']);
            }

            (new banners())->delete($id);

            header("Location: index.php?act=banner");
            exit();
        }

        public function add()
        {
            views("them");
        }
        public function store()
        {
            $data = $_POST;
            $hinh_anhs = "";
            $file_anh = $_FILES['hinh_anhs'];
            if ($file_anh['size'] > 0) {
                $hinh_anhs = "image/" . $file_anh['name'];
                move_uploaded_file($file_anh['tmp_name'], $hinh_anhs);
            }
            $data['hinh_anhs'] = $hinh_anhs;
            
            (new banners())->insert($data);
            header("Location: index.php?act=banner");
        }
        public function update()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $data = $_POST;
                $file_anh = $_FILES["hinh_anhs"];
                if ($file_anh["size"] > 0) {
                    $hinh_anhs = "image/" . $file_anh['name'];
                    $data['hinh_anhs'] = $hinh_anhs;
                    move_uploaded_file($file_anh['tmp_name'], $hinh_anhs);
                }
                (new banners())->update($data);
                header("Location: index.php?act=banner");
            }
            $id = $_GET['id'];
            $banners = (new banners())->find_one($id);
            views("update", ['banners' => $banners]);
        }
    }
