<?php

namespace App\Http\Resources;

use App\Models\Advisor;
use App\Models\AdvisorsTree;
use App\Models\ConfigTeamBonuses;
use App\Models\Order;
use App\Models\TeamBonuses;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamBonusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->advisor_id,
            'login_parent' => (Advisor::find($this->advisor_id))?Advisor::find($this->advisor_id)->login:"Parrain introuvable!!!",
            'login_fils' => (Advisor::find($this->child_id))?Advisor::find($this->child_id)->login:"Fils introuvable!!!",
            'bonuse_team'=>(Advisor::find($this->advisor_id))?$this->getBonuseTeam($this->advisor_id,$this->child_id):'null',
        ];
    }
    function getBonuseTeam($id,$child){
        $personal_score=Order::where('advisor_id',$id)->where('paid',1)->sum('total_value');
        
        if($personal_score >= 200){
            $advisor=Advisor::find($id);
            $childs_direct=AdvisorsTree::where('advisor_id',$id)->where('direct',1)->get();

            $advisor_child=Advisor::find($child);
            if($advisor_child){
                $somme=0;

                    if($advisor_child->rank_id < $advisor->rank_id){
                        $score_team_child=Order::where('advisor_id',$child)
                        ->orwhere('parent_id',$child)
                        ->where('paid',1)
                        ->sum('total_value');
                       $configteam=ConfigTeamBonuses::where('parent_rank_id',$advisor->rank_id)
                       ->where('advisor_rank_id',$advisor_child->rank_id)->first();
                       if($configteam){
                         $pourcentage=$configteam->bonus_percentage;
                       }else{
                        $pourcentage=0;
                       }
                       $somme=$score_team_child*$pourcentage/100;

                       $teamsbonusold=TeamBonuses::where('advisor_id',$id)->where('child_id',$advisor_child->id)->first();
                      if($somme !=0 && !$teamsbonusold){
                        $teambonuses=new TeamBonuses();
                        $teambonuses->advisor_id=$id;
                        $teambonuses->advisor_rank_id=$advisor->rank_id;
                        $teambonuses->child_id=$advisor_child->id;
                        $teambonuses->child_rank_id=$advisor_child->rank_id;
                        $teambonuses->amount=$somme;
                        $teambonuses->save();
                      }
                    }  

               return $somme;
            }else{
                return 0;
            }
        }else{
            return 0 ;
        }
    }
}
