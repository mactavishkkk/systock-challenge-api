<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return UserResource::collection($users);
    }

    public function show(string $id)
    {
        $user = $this->userService->getById($id);

        if (!$user) {
            return response()->json(['message' => 'User not founded'], 404);
        }

        return new UserResource($user);
    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->createUser($data);

        return new UserResource($user);
    }

    public function update(StoreUpdateUserRequest $request, string $id)
    {
        $data = $request->validated();
        $user = $this->userService->updateUser($id, $data);

        if (!$user) {
            return response()->json(['message' => 'User not founded'], 404);
        }

        return new UserResource($user);
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user = $this->userService->deleteUser($user);

        if (!$user) {
            return response()->json(['message' => 'User not founded'], 404);
        }

        return response()->json(['message' => 'User deleted successfully'], 204);
    }
}
