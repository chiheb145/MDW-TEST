<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigTeamBonuses extends Model
{
    use HasFactory;

    protected $table = 'config_team_bonuses';
    protected $fillable = [
        'parent_rank_id',
        'advisor_rank_id',
        'bonus_percentage'

    ];
}
