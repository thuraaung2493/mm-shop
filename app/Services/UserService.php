<?php

namespace App\Services;

use App\DataTransferObjects\ProfileData;
use App\DataTransferObjects\UpdatePasswordData;
use App\DataTransferObjects\UserData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected User $user;

    public function getAll()
    {
        return User::paginate();
    }

    public function find(array $where)
    {
        return User::where(is_array($where[0]) ? $where : [$where])->first();
    }

    public function getById(int $id)
    {
        return null;
    }

    public function create(UserData $userData): User
    {
        return User::create(
            $userData->setPassword($userData->getHashPassword())->toArray(),
        );
    }

    public function updateProfile(User $user, ProfileData $profileData): bool
    {
        return $user->update($profileData->toArray());
    }

    public function updatePassword(User $user, String $password): void
    {
        $user->update([
            'password' => Hash::make($password),
        ]);
    }

    public function delete(User $user): void
    {
        $user->delete();
    }

    public function activate(User $user)
    {
        $user->update(['activated_at' => now()]);
    }

    public function deactivate(User $user)
    {
        $user->update(['activated_at' => null]);
    }
}
