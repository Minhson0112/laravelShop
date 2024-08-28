<?php
namespace App\Services;
use App\Models\SalesInfo;

class SalesInfoServices{


    public function numberOfOrder($day,SalesInfo $salesInfo):int{
        $numberOfOrder = $salesInfo::whereDate("tradingDate",$day)->count();
        return $numberOfOrder;
    }



}
