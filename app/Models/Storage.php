<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'storage';

    protected $primaryKey = 'productId';

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'productId',
        'quantity',
    ];

    // Mối quan hệ với ProductInfo
    public function productInfo()
    {
        return $this->belongsTo(ProductInfo::class, 'productId', 'productId');
    }
}
