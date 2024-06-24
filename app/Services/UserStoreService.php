<?php

namespace App\Services;



use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserStoreService
{
        public static function store(array $data)
        {
            $user = User::create($data);
            $user -> access_token = JWTAuth::fromUser($user);
            return $user;
        }

}
