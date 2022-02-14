<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePajenation extends JsonResource
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
            'current_page'=>$this->count(),
            'first_page_url'=>$this->url(1),
            'from'=>$this->firstItem(),
            'last_page'=>$this->lastPage(),
            'last_page_url'=>$this->url($this->lastPage()),
            'next_page_url'=>$this->nextPageUrl(),
            'path'=>$this->getOptions()['path'],
            'per_page'=>$this->perPage(),
            'prev_page_url'=>$this->previousPageUrl(),
            'to'=>$this->lastItem(),
            'total'=>$this->total(),
            'data'=> HomeResource::collection($this->items()),
        ];
    }
}
