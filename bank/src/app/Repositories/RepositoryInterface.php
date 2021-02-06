<?php

namespace App\Repositories;

/**
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    public function getById(int $id);

    public function getAll();

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}
