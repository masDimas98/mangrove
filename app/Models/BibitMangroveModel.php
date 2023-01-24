<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibitMangroveModel extends Model
{
    // use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'bibit_mangrove';
    protected $primaryKey = 'idbibit';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idmangrove', 'tgltanam', 'dataakses', 'userid', 'foto'];

    public function getTgltanamAttribute()
    {
        return Carbon::parse($this->attributes['tgltanam'])->translatedFormat('l, d F Y');
    }
}
