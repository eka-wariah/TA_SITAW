<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class scope_categories extends Model
{
    use HasFactory, SoftDeletes ;
    protected $primaryKey = 'scs_id';
    protected $guarded = [];

    const CREATED_AT = 'scs_created_at';
    const UPDATED_AT = 'scs_updated_at';
    const DELETED_AT = 'scs_deleted_at';
}
