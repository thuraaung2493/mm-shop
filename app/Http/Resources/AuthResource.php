<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->resource['user'];
        $newAccessToken = $this->resource['newAccessToken'];

        return [
            'user' => UserResource::make($user),
            'token' => $newAccessToken->plainTextToken,
            'token_expried_at' => $newAccessToken->accessToken->expires_at,
        ];
    }
}
