<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone_no' => $this->phone_no,
            'job_title' => $this->job_title,
            'office_location' => $this->office_location,
            'is_submitted' => $this->is_submitted,
            'email' => $this->email,
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
