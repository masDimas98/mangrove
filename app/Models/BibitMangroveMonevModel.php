<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibitMangroveMonevModel extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'bibit_mangrove_monev';
    protected $primaryKey = 'idmonevbibit';

    protected $fillable = ['idbibit', 'tglmonev', 'tinggibibit', 'jml_daun', 'userid', 'foto'];
}
