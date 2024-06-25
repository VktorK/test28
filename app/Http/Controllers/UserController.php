<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\User\UserStoreRequest;
use App\Http\Resources\UserStoreResource;
use App\Services\UserService;


class UserController extends Controller
{
    /**
     * @param UserStoreRequest $request
     * @return array
     */
    public function store(UserStoreRequest $request): array
    {
        $data = $request->validationData();
        $userId = auth()->id();
        $user = UserService::store($data);
        return UserStoreResource::make($user)->resolve();
    }


}
