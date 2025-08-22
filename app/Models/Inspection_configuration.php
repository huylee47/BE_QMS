<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspection_configuration extends Model
{
    protected $table = 'inspection_configurations';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'no',
        'measuring_tool',
        'specification',
        'tolerance_upper',
        'tolerance_lower',
        'upper_limit',
        'lower_limit',
        'center'
    ];
}
