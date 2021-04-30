<?php

namespace App\Repositories\EmployeeRepository;

/**
 * Class EmployeeCsvRepository
 * @package App\Repositories
 */
class EmployeeCsvRepository implements EmployeeRepositoryInterface
{
    /**
     * Write data in a csv file
     *
     * @param array $data
     *
     * @throws \Exception
     */
    public function store(array $data)
    {
        try {
            $file = storage_path("employee.csv");
            $file = fopen($file, "a");
            fputcsv($file, $data);
        } catch ( \Exception $exception ) {
            throw new \Exception($exception);
        }
    }
}
