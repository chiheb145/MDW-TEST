<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'advisors';
    protected $fillable = [
        'rank_id',
        'parent_id',
        'login'

    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function parrain($id)
    {
        $advisor=Advisor::find($id);
        
        $parrain=Advisor::find($advisor->parent_id);
        if($parrain !== null){
            $name_parrain=$parrain->login;       
         }else{
            $name_parrain="Parrain introuvable !!";    
         } 
        
       
        return $name_parrain;
    }
}
