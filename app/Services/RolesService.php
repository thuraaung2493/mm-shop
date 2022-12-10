<?php

namespace App\Services;

use App\DataTransferObjects\RoleData;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

class RolesService
{
    public function getAll(array $orders = []): Collection
    {
        return Role::when(count($orders), function ($q) use ($orders) {
            foreach ($orders as $col => $dir) {
                $q->orderBy($col, $dir);
            }
        })->get();
    }

    public function getPaginate(?int $perPage = null): Paginator
    {
        return Role::with('permissions')->paginate($perPage);
    }

    public function upsert(Role $role, RoleData $roleData): Role
    {
        $role->fill($roleData->toArray())->save();

        $role->syncPermissions($roleData->permissions);

        return $role;
    }

    public function delete(Role $role): void
    {
        $role->permissions->each(function ($p) use ($role) {
            $role->revokePermissionTo($p->name);
        });

        $role->delete();
    }
}
