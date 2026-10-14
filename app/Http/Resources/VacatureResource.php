<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'titel'    => $this->titel,
            'plaats'   => $this->whenLoaded('bedrijf',
                fn () => $this->bedrijf->plaats),
            'salaris'  => $this->salaris,
            'fulltime' => $this->fulltime,
            'bedrijf'  => $this->whenLoaded('bedrijf',
                fn () => $this->bedrijf->naam),
        ];
    }
}
