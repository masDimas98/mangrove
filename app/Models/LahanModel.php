<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LahanModel extends Model
{
    // use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'lahan';
    protected $primaryKey = 'idlahan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['iddesa', 'namalahan', 'kepemilikan', 'luas', 'latitude', 'longitude', 'userid'];
}
