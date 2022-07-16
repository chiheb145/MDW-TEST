<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use App\Models\Advisor;
use App\Models\Order;
use App\Models\PersonalScore;
use App\Models\AdvisorsTree;
use App\Models\TeamScore;

class ScoresResource extends JsonResource
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
            'id_advisor' => $this->advisor_id,
            'advisor_name' => Advisor::find($this->advisor_id)->login,
            'score_personal' => number_format($this->getPersonalScore($this->advisor_id),3),
            'score_team' => number_format($this->getTeamScore($this->advisor_id),3),
        ];
    }
    function getPersonalScore($id)
    {
        $score = Order::where('paid',1)->where('advisor_id',$id)->sum('total_value');
        $personal_Score=PersonalScore::where('advisor_id',$id)->first();
        if($personal_Score){
            $personal_Score->amount=$score;
        }else{
           $new_score=new PersonalScore();
           $new_score->advisor_id=$id;
           $new_score->amount=$score;
           $new_score->save();
        }
        return $score;
    }
    function getTeamScore($id){
        $personal_Score=PersonalScore::where('advisor_id',$id)->first();
          $childs=AdvisorsTree::where('advisor_id',$id)->pluck('child_id');
          $score_childs = Order::where('paid',1)->whereIn('advisor_id',$childs)->sum('total_value');
          $team_Score=TeamScore::where('advisor_id',$id)->first();
          

        if($team_Score){
            $team_Score->amount=$personal_Score->amount + $score_childs;
        }else{
           $new_score=new TeamScore();
           $new_score->advisor_id=$id;
           $new_score->amount=$personal_Score->amount + $score_childs;
           $new_score->save();
        }
        return $personal_Score->amount + $score_childs;
     }
}
