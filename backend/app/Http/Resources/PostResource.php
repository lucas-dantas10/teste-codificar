<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'id' => $this->id,
            'text' => $this->text,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(), 
            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],
            // 'created_at' => (new DateTime($this->created_at))->format('Y-m-d H:i:s'), 
        ];
    }
}
