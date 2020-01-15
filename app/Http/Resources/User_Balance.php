<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User_Balance extends JsonResource
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
          'user_id' => $this->user_id,
          'balance' => $this->balance,
            'balance_achieve' => $this->balance_achieve
        ];
    }
}
