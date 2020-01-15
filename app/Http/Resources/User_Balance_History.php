<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User_Balance_History extends JsonResource
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
          'user_balance_id' => $this->user_balance_id,
            'balance_before' => $this->balance_before,
            'balance_after' => $this->balance_after,
            'activity' => $this->activity,
            'type' => $this->type,
            'ip' => $this->ip,
            'location' => $this->location,
            'user_agent' => $this->user_agent,
            'author' => $this->author
        ];
    }
}
