<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    // use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'kecamatan';
    protected $primaryKey = 'idkec';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['namakec', 'userid'];
}
