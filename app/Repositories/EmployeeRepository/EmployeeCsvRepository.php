<?php

namespace App\Repositories\EmployeeRepository;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Class EmployeeCsvRepository
 * @package App\Repositories
 */
class EmployeeCsvRepository implements EmployeeRepositoryInterface
{
    /**
     * @var string
     */
    private string $fileName = "employee.csv";

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
            $filePath = storage_path($this->fileName);
            $file     = fopen($filePath, "a");
            fputcsv($file, $data);
            fclose($file);
        } catch (\Exception $exception) {
            throw new \Exception($exception);
        }
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        $filePath  = storage_path($this->fileName);
        $employees = [];

        if (!file_exists($filePath)) {
            return collect($employees);
        }

        $file = fopen($filePath, "r");

        while (($employeesDataSet = fgetcsv($file, 1000, ",")) !== false) {
            $employees[] = $this->getFormatted($employeesDataSet);
        }

        fclose($file);

        return collect($employees)->sortByDesc("created_at")->values();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findById(int $id): array
    {
        $filePath = storage_path($this->fileName);
        $employee = [];

        if (!file_exists($filePath)) {
            return $employee;
        }

        $file = fopen($filePath, "r");

        while (($employeesDataSet = fgetcsv($file, 1000, ",")) !== false) {
            if ((int) $employeesDataSet[0] === $id) {
                return $this->getFormatted($employeesDataSet);
            }
        }

        return $employee;
    }

    /**
     * @param $employeesDataSet
     *
     * @return array
     */
    private function getFormatted($employeesDataSet): array
    {
        return [
            "id"                     => $employeesDataSet[0],
            "name"                   => $employeesDataSet[1],
            "gender"                 => Str::ucfirst($employeesDataSet[2]),
            "phone"                  => $employeesDataSet[3],
            "email"                  => $employeesDataSet[4],
            "address"                => $employeesDataSet[5],
            "nationality"            => $employeesDataSet[6],
            "dob"                    => $employeesDataSet[7],
            "educational_background" => $employeesDataSet[8],
            "mode_of_contact"        => Str::ucfirst($employeesDataSet[9]),
            "created_at"             => $employeesDataSet[10],
            "updated_at"             => $employeesDataSet[11],
        ];
    }
}
