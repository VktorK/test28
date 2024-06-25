<?php

namespace App\Observers;

use App\Models\Car;
use App\Models\Role;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $roleId = Role::roleId()->first()->id;
        $userId = User::userIdLast()->first()->id;
        $user->roles()->attach([
            1 => ['role_id' => $roleId,
                'user_id' => $userId],

        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleting(User $user): void
    {
        Car::where('user_id', auth()->user()->id)->update([
            'user_id' => null
        ]);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
