<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\RoleData;
use App\Http\Requests\UpsertRoleRequest;
use App\Services\PermissionsService;
use App\Services\RolesService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(
        private readonly RolesService $rolesService,
        private readonly PermissionsService $permissionsService,
    ) {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index', [
            'roles' => $this->rolesService->getPaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create', [
            'permissions' => $this->permissionsService->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpsertRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertRoleRequest $request)
    {
        $this->upsert($request, new Role());

        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'permissions' => $this->permissionsService->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpsertRoleRequest  $request
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertRoleRequest $request, Role $role)
    {
        $this->upsert($request, $role);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->rolesService->delete($role);

        return redirect()->route('roles.index');
    }

    private function upsert(UpsertRoleRequest $request, Role $role): Role
    {
        $roleData = RoleData::fromRequest($request);

        return $this->rolesService->upsert($role, $roleData);
    }
}
