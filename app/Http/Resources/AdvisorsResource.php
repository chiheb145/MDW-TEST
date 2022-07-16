<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

use App\Models\Advisor;


class AdvisorsResource extends JsonResource
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
            'id' => $this->id,
            'login' => Advisor::find($this->id)->login,
            'rang' => Advisor::find($this->id)->rank_id ,
            'Parent' =>$this->getLoginParent($this->id),
            
        ];
    }
    function getLoginParent($id)
    {
        $advisor=Advisor::find($id);
        if($advisor->parent_id == 0){
            return '--';
        }
        $parent=Advisor::find($advisor->parent_id);
        if($parent !== null){
            return $parent->login;
        }else{
            return 'Parent introuvable !!!';
        }
    }
}
