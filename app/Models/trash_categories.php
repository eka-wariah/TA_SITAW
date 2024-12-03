<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class trash_categories extends Model
{
    use HasFactory, SoftDeletes ;
    protected $primaryKey = 'trc_id';
    protected $guarded = [];

    const CREATED_AT = 'trc_created_at';
    const UPDATED_AT = 'trc_updated_at';
    const DELETED_AT = 'trc_deleted_at';
}
