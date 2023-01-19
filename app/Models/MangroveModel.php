<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangroveModel extends Model
{
    // use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'mangrove';
    protected $primaryKey = 'idmangrove';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idjenis', 'mangrovelatin', 'mangroveindo', 'userid'];
}
