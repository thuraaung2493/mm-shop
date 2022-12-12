<?php

namespace App\Services;

use App\DataTransferObjects\PermissionData;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;

class PermissionsService
{
    public function getAll(): Collection
    {
        return Permission::all();
    }

    public function getPaginate(?int $perPage = null): Paginator
    {
        return Permission::paginate($perPage);
    }

    public function upsert(Permission $permission, PermissionData $permissionData): Permission
    {
        $permission->fill($permissionData->toArray())->save();

        return $permission;
    }

    public function delete(Permission $permission): void
    {
        $permission->delete();
    }
}
