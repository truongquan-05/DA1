<?php

class KhuyenMai
{
    public function khuyen_mai() {
        $danh_muc = (new Md_danh_muc())->all();
        $khuyenmai=(new khuyenmais())->all();
        view('khuyen_mai',['khuyenmai'=>$khuyenmai,'danh_muc'=>$danh_muc]);  


    }
}
