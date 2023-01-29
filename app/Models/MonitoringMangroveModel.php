<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class MonitoringMangroveModel extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'monev_mangrove';
    protected $primaryKey = 'idmonev';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idtanam', 'tglmonev', 'jml_mati', 'jml_hidup', 'dataakses', 'userid', 'foto'];

    public function getTglmonevAttribute()
    {
        return Carbon::parse($this->attributes['tglmonev'])->translatedFormat('l, d F Y');
    }
}
