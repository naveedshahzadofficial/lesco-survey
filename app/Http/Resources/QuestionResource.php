<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
          'section_id'=> $this->section_id,
          'question_e'=> $this->question_e,
          'question_u'=> $this->question_u,
          'question_type'=> $this->question_type,
          'options' => OptionResource::collection($this->whenLoaded('options')),

        ];
    }
}
