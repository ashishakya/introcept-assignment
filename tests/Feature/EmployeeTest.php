<?php

namespace Tests\Feature;

use App\Constants\ContactModes;
use App\Constants\Genders;
use App\Constants\General;
use Faker\Factory;
use Tests\TestCase;

/**
 * Class EmployeeTest
 * @package Tests\Feature
 */
class EmployeeTest extends TestCase
{
    /**
     * @test
     *
     * Test Basic Test
     */
    public function basic_test()
    {
        $response = $this->get("/");

        $response->assertStatus(302);
    }

    /**
     * @test
     *
     * Checks if employee api is up and running.
     */
    public function does_employees_list_api_exists()
    {
        $response = $this->get("/api/employees");

        $response->assertStatus(200);
    }

    /**
     * @test
     *
     * Checks if the API has valid structure
     */
    public function if_employees_list_api_has_valid_json_structure()
    {
        $response = $this->get("/api/employees");

        $response->assertJsonStructure(
            [
                "success",
                "message",
                "data" => [
                    "*" => [
                        "id",
                        "name",
                        "gender",
                        "phone",
                        "email",
                        "address",
                        "nationality",
                        "dob",
                        "educational_background",
                        "mode_of_contact",
                        "created_at",
                        "updated_at",
                    ],
                ],
            ]
        );
    }

    /**
     * @test
     *
     * Checks if employee api validates data.
     */
    public function if_employee_store_api_accepts_valid_data()
    {
        $faker          = Factory::create();
        $genders        = array_values(Genders::all());
        $modeOfContacts = array_values(ContactModes::all());
        $response       = $this->post(
            "/api/employees",
            [
                "name"                   => $faker->name,//string max:255 characters
                "gender"                 => $genders[array_rand($genders)], // only accepts 'male', 'female' and 'other'
                "phone"                  => random_int(9841000000, 9841999999), // accepts 10 digits numeric data starting with  9841
                "email"                  => $faker->safeEmail, // valid email format
                "address"                => $faker->streetAddress, //string max:255 characters
                "nationality"            => $faker->country,//string max:255 characters
                "dob"                    => $faker->date(General::DATE_FORMAT),//date of "Y-m-d" format Eg: 2020-02-02
                "educational_background" => $faker->text(25), //string max:255 characters
                "mode_of_contact"        => $modeOfContacts[array_rand($modeOfContacts)],// only accepts 'phone', 'email', 'none'
            ]
        );

        $response->assertSessionHasNoErrors();
    }
}
