<?php

namespace App\Repository;

use App\Interface\Repository\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function createUser(object $data)
    {
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        if (isset($data->password)) {
            $user->password = bcrypt($data->password);
        } else {
            throw new \InvalidArgumentException('Password is required.');
        }
        $user->save();

        return $user->fresh();
    }
}
