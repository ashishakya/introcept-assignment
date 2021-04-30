<?php

namespace App\Http\Requests\Employee;

use App\Constants\ContactModes;
use App\Constants\Genders;
use App\Repositories\EmployeeRepository\EmployeeRepositoryInterface;
use App\Rules\MobileNumberValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class EmployeeCreateRequest
 * @package App\Http\Requests\Employee
 */
class EmployeeCreateRequest extends FormRequest
{
    /**
     * @var \App\Repositories\EmployeeRepository\EmployeeRepositoryInterface
     */
    private $employeeCsvRepository;

    /**
     * EmployeeCreateRequest constructor.
     *
     * @param \App\Repositories\EmployeeRepository\EmployeeRepositoryInterface $employeeCsvRepository
     */
    public function __construct(EmployeeRepositoryInterface $employeeCsvRepository)
    {
        $this->employeeCsvRepository = $employeeCsvRepository;
    }

    /**
     * @var array
     */
    private $data;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "name"                   => ['required', "string", "max:255"],
            "gender"                 => ['required', "string", Rule::in(array_values(Genders::all()))],
            "phone"                  => ['required', new MobileNumberValidationRule()],
            "email"                  => ['required', "email"],
            "address"                => ['required', "string", "max:255"],
            "nationality"            => ['required', "string", "max:255"],
            "dob"                    => ['required', "date", "before:today", "date_format:Y-m-d"],
            "educational_background" => ['required', "string", "max:255"],
            "mode_of_contact"        => ['required', "string", Rule::in(array_values(ContactModes::all()))],
        ];
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        return array_merge(
            ["id" => time()],
            parent::validated(),
            [
                "created_at" => now(),
                "updated_at"=>now()
            ]
        );
    }

    /**
     * @return $this
     */
    public function prepare(): EmployeeCreateRequest
    {
        $this->data = $this->validated();

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function persist()
    {
        try {
            $this->employeeCsvRepository->store($this->data);
        } catch ( \Exception $e ) {
            throw new \Exception($e);
        }
    }
}
