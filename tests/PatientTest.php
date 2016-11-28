<?php

class PatientTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    protected $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create();
    }

    public function testCreatePatient()
    {
        $name     = $this->faker->name;
        $email    = $this->faker->email;
        $password = $this->faker->password;
        $age      = 25;
        $phone    = $this->faker->phoneNumber;
        $address  = $this->faker->address;
        $gender   = $this->faker->gender;
        $password = $this->faker->password;
        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->see('home')
            ->visit('/operator/add')
            ->press('Submit')
            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The password field is required.')
            ->see('The confirm password field is required.')
            ->type($name, 'name')
            ->press('Submit')
            ->see('The email field is required.')
            ->see('The password field is required.')
            ->see('The confirm password field is required.')
            ->type($name, 'name')
            ->type($email, 'email')
            ->press('Submit')
            ->see('The password field is required.')
            ->see('The confirm password field is required.')
            ->type($name, 'name')
            ->type($email, 'email')
            ->type($password, 'password')
            ->press('Submit')
            ->see('The confirm password field is required')
            ->type($name, 'name')
            ->type($email, 'email')
            ->type($password, 'password')
            ->type($password, 'confirm_password')
            ->press('Submit')
            ->see('Operator added successfully')
            ->dontSee('Whoops! Something went wrong!')
            ->seeInDatabase('users', ['email' => $email])
            ->assertSessionHas('flash');
    }
}
