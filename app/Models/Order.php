<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'orders';
    protected $fillable = [
        'advisor_id',
        'advisor_rank_id',
        'parent_id',
        'parent_rank_id',
        'total_value',
        'paid',
        'fo'
    ];
    protected $dates = [
        'paid_at',
    ];
   
}
