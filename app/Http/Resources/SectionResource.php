<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id'=> $this->id,
          'section_e'=> $this->section_e,
          'section_u'=> $this->section_u,
          'section_desc_e'=> $this->section_desc_e,
          'section_desc_u'=> $this->section_desc_u,
        ];
    }
}
