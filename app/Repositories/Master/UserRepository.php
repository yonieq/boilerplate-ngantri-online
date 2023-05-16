<?php

namespace App\Repositories\Master;

use App\Models\User;

class UserRepository
{
    public function getAll($request)
    {
        $user = User::paginate($request->per_page ?? 10);

        return $user;
    }

    public function save($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return $user;
    }

    public function getById($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function edit($request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => bcrypt($request->password) ?? $user->password,
        ]);

        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $user;
    }
}
