<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
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
            'title'=>$this->title,
            'price'=>$this->price,
            'cover_image'=>asset('assets/image/'.$this->cover_image),
            'city'=>$this->city,
            'desc'=>$this->desc,
            'sales_agent'=>$this->sales_agent,
            'sales_agent_phone'=>$this->sales_agent_phone,
            'link'=>$this->link,
            'properties'=>$this->properties,
            'gallery'=>$this->images
        ];
    }
}
