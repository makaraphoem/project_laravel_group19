<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstructionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'charge_the_batterie'=>$this->charge_the_batterie,
            'download_the_app'=>$this->download_the_app,
            'find_a_safe_location'=>$this->find_a_safe_location,
            'take_off_and_fly'=>$this->take_off_and_fly,
            'action'=>(bool) $this->action,
        ];
    }
}
