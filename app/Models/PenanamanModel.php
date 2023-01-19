<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanamanModel extends Model
{
    // use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'penanaman_mangrove';
    protected $primaryKey = 'idtanam';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idmangrove', 'idlahan', 'idtanam', 'tgltanam', 'jmltanam', 'pihaktanam', 'statustanam', 'userid'];
}
