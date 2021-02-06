<?php

namespace App\Services\Users;

use App\Repositories\UsersRepository\UserRepository;

/**
 * Class UserService
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    /**
     * @param array $data
     */
    public function registerUser(array $data)
    {
        $data = [
            'name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'password' => $data['password'],
            'email' => $data['email']
        ];

        $this->userRepo->create($data);
    }
}
