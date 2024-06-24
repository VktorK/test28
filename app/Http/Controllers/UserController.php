<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserStoreResource;

use App\Services\UserStoreService;


class UserController extends Controller
{
    public function store(UserStoreRequest $request): array
    {
        $data = $request->validationData();
        $user = UserStoreService::store($data);
        return UserStoreResource::make($user)->resolve();
    }


}
