<?php

class ThongkeController
{
    private $model;

    public function __construct()
    {
        $this->model = new Thongkes();
    }
    public function showStatistics()
    {
        $tong_don = (new Thongkes())->all();
        $tong_sp = (new Thongkes())->thong_ke_so_luong_san_pham();
        $dh_da_hoan_thanh = (new Thongkes())->dh_da_hoan_thanh();
        $thong_ke_doanh_thu = (new Thongkes())->thong_ke_doanh_thu();
        $date = (new Thongkes())->date();
        $doanh_thu_ngay = [];
        foreach($date as $date__){
            $doanh_thu_ngay[] = (new Thongkes())->doanh_thu_ngay($date__['data_date']);
        }
       
        

    
        view('dashboard',[
            'tong_don'=>$tong_don,
            'tong_sp'=>$tong_sp,
            'dh_da_hoan_thanh'=>$dh_da_hoan_thanh,
            'thong_ke_doanh_thu'=>$thong_ke_doanh_thu,
            'date'=>$date,
            'doanh_thu_ngay'=>$doanh_thu_ngay
        
        
        ]);

       
    }
}
