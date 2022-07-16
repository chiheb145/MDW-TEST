<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorsTree extends Model
{
    use HasFactory;
    protected $table = 'advisors_tree';
    protected $fillable = [
        'advisor_id',
        'child_id',
        'direct'
        
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
