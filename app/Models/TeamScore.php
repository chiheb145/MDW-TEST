<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamScore extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'team_scores';
    protected $fillable = [
        'advisor_id',
        'amount'
        
    ];
}
