<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],
            'text' => $this->text,
            'created_at' => (new DateTime($this->created_at))->format('Y-m-d H:i:s'), 
        ];
    }
}
