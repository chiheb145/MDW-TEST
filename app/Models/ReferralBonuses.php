<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralBonuses extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'referral_bonuses';
    protected $fillable = [
        'advisor_id',
        'order_id',
        'amount'
        
    ];
}
