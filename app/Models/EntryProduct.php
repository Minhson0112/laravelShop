<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryProduct extends Model
{
    use HasFactory;

    protected $table = 'entryProduct';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'productId',
        'quantity',
        'price',
        'entryDate',
    ];

    // Mối quan hệ với ProductInfo
    public function productInfo()
    {
        return $this->belongsTo(ProductInfo::class, 'productId', 'productId');
    }
}
