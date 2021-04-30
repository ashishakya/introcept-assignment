<?php

namespace App\Repositories\EmployeeRepository;

use Illuminate\Support\Collection;

/**
 * Interface EmployeeRepositoryInterface
 * @package App\Repositories\EmployeeRepository
 */
interface EmployeeRepositoryInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data);

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection;

    /**
     * @param int $id
     *
     * @return array
     */
    public function findById(int $id):array;
}
