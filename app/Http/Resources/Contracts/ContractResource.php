<?php

namespace App\Http\Resources\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type'=> $this->type,
            'text'=> $this->text,
            'created_at' => $this->created_at,
            'property_id' => $this->property_id,
            'owner_id' => $this->owner_id,
            'owner_type' => $this->owner_type,
            'owner' => $this->owner,
            'property' => $this->property,

        ];
    }
}
