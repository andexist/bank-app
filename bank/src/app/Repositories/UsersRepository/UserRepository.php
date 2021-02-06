<?php

namespace App\Repositories\UsersRepository;

use App\Models\User;
use App\Repositories\RepositoryInterface;
use Mockery\Exception;

/**
 * Class UserRepository
 * @package App\Repositories\UsersRepository
 */
class UserRepository implements RepositoryInterface
{
    public function getById(int $id)
    {
        return User::query()->findOrFail($id);
    }

    public function getAll()
    {
        return User::all();
    }

    public function create(array $data)
    {
        try {
            User::query()->create($data);
        } catch (Exception $exception) {
            // log error
        }
    }

    public function update(int $id, array $data)
    {
        try {
            User::query()->where('id', $id)->update($data);
        } catch (Exception $exception) {
            // log error
        }
    }

    public function delete(int $id)
    {
        try {
            User::query()->where('id', $id)->delete();
        } catch (Exception $exception) {
            // log error
        }
    }
}
