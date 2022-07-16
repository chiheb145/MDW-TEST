<?php

namespace App\Http\Resources;

use App\Models\Advisor;
use App\Models\ConfigReferralBonuses;
use App\Models\Order;
use App\Models\ReferralBonuses;
use Illuminate\Http\Resources\Json\JsonResource;

class PrimeParrainageResource extends JsonResource
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
            'id_order' => $this->id,
            'login_parent' => (Advisor::find($this->parent_id))?Advisor::find($this->parent_id)->login:"Parent introuvable!!!",
            'login_fils' => (Advisor::find($this->advisor_id))?Advisor::find($this->advisor_id)->login:"Parent introuvable!!!",
            'prime_referral'=>(Advisor::find($this->parent_id))?$this->getReferralBonuses($this->id):'null',
        ];
    }
    function getReferralBonuses($id){
            $order=Order::find($id);
            $pourcentage=ConfigReferralBonuses::where('parent_rank_id',$order->parent_rank_id)->first()->bonus_percentage;
            $prime=($order->total_value * $pourcentage) /100;
        $referral_bonus_order=ReferralBonuses::where('order_id',$id)->where('advisor_id',$order->parent_id)->first();
        if(!$referral_bonus_order){
            $new_referral_bonus=new ReferralBonuses();
            $new_referral_bonus->advisor_id=$order->parent_id;
            $new_referral_bonus->order_id=$id;
            $new_referral_bonus->amount=$prime;
            $new_referral_bonus->save();
        }
        return $prime;

    }
}
