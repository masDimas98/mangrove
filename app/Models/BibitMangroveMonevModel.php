<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BibitMangroveMonevModel extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'bibit_mangrove_monev';
    protected $primaryKey = 'idmonevbibit';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idbibit', 'tglmonev', 'tinggibibit', 'dataakses', 'jml_daun', 'userid', 'foto'];

    public function getTglmonevAttribute()
    {
        return Carbon::parse($this->attributes['tglmonev'])->translatedFormat('l, d F Y');
    }
}
