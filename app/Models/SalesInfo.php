<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInfo extends Model
{
    use HasFactory;

    protected $table = 'salesInfo';

    protected $primaryKey = 'tradingId';

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'productId',
        'clientName',
        'address',
        'tradingQuantity',
        'price',
        'profit',
        'tradingDate',
    ];

    // Mối quan hệ với ProductInfo
    public function productInfo()
    {
        return $this->belongsTo(ProductInfo::class, 'productId', 'productId');
    }
}
