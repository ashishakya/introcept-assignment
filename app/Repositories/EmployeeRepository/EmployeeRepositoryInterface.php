<?php

namespace App\Repositories\EmployeeRepository;

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
}
