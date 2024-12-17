<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class administrators extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'administrators';
    protected $primaryKey = 'adm_id';
    protected $guarded = [];

    const CREATED_AT = 'adm_created_at';
    const UPDATED_AT = 'adm_updated_at';
    const DELETED_AT = 'adm_deleted_at';

    public function user()
    {
        return $this->belongsTo(User::class, 'adm_name_id', 'usr_id');
    }

    public function scope_categories()
    {
        return $this->belongsTo(scope_categories::class, 'adm_scope_management_id', 'scs_id');
    }

}
