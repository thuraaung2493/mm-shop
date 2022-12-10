<?php

namespace App\Services;

use App\DataTransferObjects\ProfileData;
use App\DataTransferObjects\UserData;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getAll(): Collection
    {
        return User::with('roles')->get();
    }

    public function getPaginate(?int $perPage = null): Paginator
    {
        return User::with('roles')->paginate($perPage);
    }

    public function find(array $where): User
    {
        return User::where(is_array($where[0]) ? $where : [$where])->first();
    }

    public function getCount(): int
    {
        return User::count();
    }

    public function create(UserData $userData): User
    {
        $user = User::create(
            $userData->setPassword($userData->getHashPassword())->toArray(),
        );

        $user->syncRoles($userData->roles);

        return $user;
    }

    public function updateProfile(User $user, ProfileData $profileData): bool
    {
        $user->syncRoles($profileData->roles);

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
        if ($user->roles->isNotEmpty()) {
            $user->syncRoles([]);
        }

        $user->delete();
    }

    public function activate(User $user): void
    {
        $user->update(['activated_at' => now()]);
    }

    public function deactivate(User $user): void
    {
        $user->update(['activated_at' => null]);
    }
}
