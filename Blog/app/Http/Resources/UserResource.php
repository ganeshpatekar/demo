<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        if($request){
            
        return $data = [ "Status"=>200,
            
            'user_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'permissions' => $this->permissions->pluck('name')->toArray() ?? [],
            'token' => $this->createToken("token")->plainTextToken,
            'roles' => $this->roles->pluck('name')->toArray() ?? [],
            'roles_permissions' => $this->getPermissionsViaRoles()->pluck('name')->toArray() ?? [],
        ];

    }
    }
}
