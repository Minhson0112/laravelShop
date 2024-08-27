<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    use HasFactory;

    // Tên bảng tương ứng trong cơ sở dữ liệu
    protected $table = 'productInfo';

    // Khóa chính của bảng
    protected $primaryKey = 'productId';

    // Kiểu dữ liệu của khóa chính
    protected $keyType = 'int';

    // Nếu bảng không có các cột timestamps (created_at, updated_at)
    public $timestamps = false;

    // Các cột có thể được gán hàng loạt
    protected $fillable = [
        'productName',
        'category',
        'entryPrice',
        'sellPrice',
        'addDate',
        'isDelete',
    ];

    // Định nghĩa các mối quan hệ
    public function storage()
    {
        return $this->hasOne(Storage::class, 'productId', 'productId');
    }

    public function salesInfos()
    {
        return $this->hasMany(SalesInfo::class, 'productId', 'productId');
    }

    public function entryProducts()
    {
        return $this->hasMany(EntryProduct::class, 'productId', 'productId');
    }
}
