<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
  public function getAll()
  {
    $users = User::paginate();
    return $users;
  }

  public function getById($id)
  {
    $user = User::findOrFail($id);
    return $user;
  }

  public function createUser($data)
  {
    $password = $data['password'];
    $data['password'] = bcrypt($password);

    $user = User::create($data);

    return $user;
  }

  public function updateUser($id, $data)
  {
    $user = User::find($id);

    if ($data['password']) {
      $password = $data['password'];
      $data['password'] = bcrypt($password);
    }

    $user->update($data);

    return $user;
  }

  public function deleteUser($user)
  {
    $user->delete();
    return $user;
  }
}
