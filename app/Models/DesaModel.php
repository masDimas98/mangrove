<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesaModel extends Model
{
    // use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'desa';
    protected $primaryKey = 'iddes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['namadesa', 'userid', 'idkec'];
}
