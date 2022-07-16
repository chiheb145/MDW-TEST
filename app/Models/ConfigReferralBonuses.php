<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigReferralBonuses extends Model
{
    use HasFactory;

    protected $table = 'config_referral_bonuses';
    protected $fillable = [
        'parent_rank_id',
        'child_rank_id',
        'bonus_percentage'

    ];
    
}
