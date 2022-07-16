<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamBonuses extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'team_bonuses';
    protected $fillable = [
        'advisor_id',
        'advisor_rank_id',
        'child_id',
        'child_rank_id',
        'amount'

        
    ];
}
