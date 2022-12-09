<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\ProfileData;
use App\DataTransferObjects\UpdatePasswordData;
use App\DataTransferObjects\UserData;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpsertUserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => $this->userService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertUserRequest $request)
    {
        $userData = UserData::fromRequest($request);

        $this->userService->create($userData);

        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertUserRequest $request, User $user)
    {
        $profileData = ProfileData::fromRequest($request);

        $this->userService->updateProfile($user, $profileData);

        return redirect()->route('users.index');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        $this->userService->updatePassword($user, $request->validated('password'));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user);

        return redirect()->route('users.index');
    }

    public function activate(User $user)
    {
        $this->userService->activate($user);

        return redirect()->route('users.index');
    }

    public function deactivate(User $user)
    {
        $this->userService->deactivate($user);

        return redirect()->route('users.index');
    }

    private function upsert(UpsertUserRequest $request, User $user): User
    {
        $userData = UserData::fromRequest($request);

        return $this->userService->upsert($user, $userData);
    }
}
