<?php

namespace App\Http\Controllers\webController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class webController extends Controller

{
    public function home(){

        $today = date('Y-m-d'); // Ngày hôm nay
        $numberOfOrdersToday = 5; // Số lượng đơn hàng giả định
        $orderDifference = "+2"; // So với ngày hôm qua
        $priceToday = 10000; // Doanh thu hôm nay (giả định)
        $priceDifference = "+1000"; // So với ngày hôm qua

        // Trả về view 'home' cùng với các biến này
        return view('home', compact('today', 'numberOfOrdersToday', 'orderDifference', 'priceToday', 'priceDifference'));
    }

}
