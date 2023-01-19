<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMangroveModel extends Model
{
    // use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'jenismangrove';
    protected $primaryKey = 'idjenis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['namajenislatin', 'namajenisindo', 'userid'];
}
