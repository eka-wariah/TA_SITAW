<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment_categories extends Model
{
    use HasFactory, SoftDeletes ;
    protected $primaryKey = 'pyc_id';
    protected $guarded = [];

    const CREATED_AT = 'pyc_created_at';
    const UPDATED_AT = 'pyc_updated_at';
    const DELETED_AT = 'pyc_deleted_at';
}
