<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'shortlink' => $this->shortlink,
            'longlink' => $this->longlink,
            'counter' => $this->counter,  
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
