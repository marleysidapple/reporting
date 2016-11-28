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
        $age      = 25;
        $phone    = $this->faker->phoneNumber;
        $address  = $this->faker->address;
        $gender   = 'male';
        $password = $this->faker->password;
        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->see('home')
            ->visit('/patient/add')
            ->press('Submit')
            ->see('The name field is required.')
            ->see('The email field is required.')
            ->see('The address field is required.')
            ->see('The phone field is required.')
            ->see('The age field is required.')
            ->see('The gender field is required.')
            ->see('The password field is required.')
            ->see('The confirm password field is required.')
            ->type($name, 'name')
            ->type($email, 'email')
            ->type($age, 'age')
            ->press('Submit')
            ->see('The phone field is required.')
            ->see('The address field is required.')
            ->see('The gender field is required.')
            ->see('The password field is required.')
            ->see('The confirm password field is required.')
            ->type($name, 'name')
            ->type($email, 'email')
            ->type($age, 'age')
            ->type($phone, 'phone')
            ->type($address, 'address')
            ->type($gender, 'gender')
            ->type($password, 'password')
            ->type($password, 'confirm_password')
            ->press('Submit')
            ->see('Patient added successfully')
            ->dontSee('Whoops! Something went wrong!')
            ->seeInDatabase('users', ['email' => $email])
            ->assertSessionHas('flash');
    }

    public function testViewPatient()
    {
        $user = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'age'      => 25,
            'phone'    => $this->faker->phoneNumber,
            'address'  => $this->faker->address,
            'gender'   => 'male',
            'password' => $this->faker->password,
        ]);
        $patient = App\Role::where('name', 'Patient')->first();
        $user->attachRole($patient);
        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/patient/' . $user->id . '/detail')
            ->see($user->name)
            ->see($user->email)
            ->see($user->age)
            ->see($user->address)
            ->see($user->phone);
    }

    public function testEditPatient()
    {
        $user = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'age'      => 25,
            'phone'    => $this->faker->phoneNumber,
            'address'  => $this->faker->address,
            'gender'   => 'male',
            'password' => $this->faker->password,
        ]);
        $patient = App\Role::where('name', 'Patient')->first();
        $user->attachRole($patient);
        $this->seeInDatabase('users', ['email' => $user->email]);
        $newName    = $this->faker->name;
        $newEmail   = $this->faker->email;
        $newAddress = $this->faker->address;
        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/patient/' . $user->id . '/edit')
            ->type($newName, 'name')
            ->type($newEmail, 'email')
            ->type($newAddress, 'address')
            ->press('Update')
            ->followRedirects();
        $this->seePageIs('/patient/' . $user->id . '/edit')->see('Patient updated successfully');
        $user = App\User::find($user->id);
        $this->assertEquals($newEmail, $user->email);
        $this->assertEquals($newName, $user->name);
    }

    public function testDeletePatient()
    {
        $user = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'age'      => 25,
            'phone'    => $this->faker->phoneNumber,
            'address'  => $this->faker->address,
            'gender'   => 'male',
            'password' => $this->faker->password,
        ]);
        $patient = App\Role::where('name', 'Patient')->first();
        $user->attachRole($patient);
        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/patient/' . $user->id . '/delete')
            ->seePageIs('/patient/list')
            ->see('Patient deleted successfully');
        $this->dontSeeInDatabase('users', ['email' => $user->email]);
    }
}
