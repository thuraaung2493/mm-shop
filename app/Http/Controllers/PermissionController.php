<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\PermissionData;
use App\Http\Requests\UpsertPermissionRequest;
use App\Services\PermissionsService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(
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
        return view('permissions.index', [
            'permissions' => $this->permissionsService->getPaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpsertPermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertPermissionRequest $request)
    {
        $this->upsert($request, new Permission());

        return redirect()->route('permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', [
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpsertPermissionRequest  $request
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertPermissionRequest $request, Permission $permission)
    {
        $this->upsert($request, $permission);

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $this->permissionsService->delete($permission);

        return redirect()->route('permissions.index');
    }

    private function upsert(UpsertPermissionRequest $request, Permission $permission): Permission
    {
        $permissionData = PermissionData::fromRequest($request);

        return $this->permissionsService->upsert($permission, $permissionData);
    }
}
