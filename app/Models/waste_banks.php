<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class waste_banks extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'waste_banks';
    protected $primaryKey = 'wtb_id';
    protected $guarded = [];

    const CREATED_AT = 'wtb_created_at';
    const UPDATED_AT = 'wtb_updated_at';
    const DELETED_AT = 'wtb_deleted_at';

    public function user()
    {
        return $this->belongsTo(User::class, 'wtb_name_id', 'usr_id');
    }

    public function trash_categories()
    {
        return $this->belongsTo(trash_categories::class, 'wtb_category_trash_id', 'trc_id');
    }

    protected static function booted()
    {
        static::saving(function ($waste_bank) {
            // Pastikan kategori sampah ada dan harga tersedia
            if ($waste_bank->trash_categories) {
                // Hitung total uang = jumlah sampah * harga kategori
                $waste_bank->wtb_total_money = $waste_bank->wtb_total_wate * $waste_bank->trash_categories->trc_price;
            }
        });
    }
    
}
