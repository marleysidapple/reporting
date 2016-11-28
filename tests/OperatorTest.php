<?php

class OperatorTest extends TestCase
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

    public function testCreateOperator()
    {
        $name     = $this->faker->name;
        $email    = $this->faker->email;
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

    public function testViewOperator()
    {
        $user = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'password' => $this->faker->password,
        ]);
        $op = App\Role::where('name', 'Operator')->first();
        $user->attachRole($op);
        $this->seeInDatabase('users', ['email' => $user->email]);
        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/operator/' . $user->id . '/view')
            ->see($user->name)
            ->see($user->email);
    }


    public function testEditOperator()
    {
        $user = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'password' => $this->faker->password,
        ]);
        $op = App\Role::where('name', 'Operator')->first();
        $user->attachRole($op);
        $this->seeInDatabase('users', ['email' => $user->email]);
        $newName     = $this->faker->name;
        $newEmail    = $this->faker->email;
        $newPassword = $this->faker->password;
        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/operator/' . $user->id . '/edit')
            ->type($newName, 'name')
            ->type($newEmail, 'email')
            ->type($newPassword, 'password')
            ->type($newPassword, 'confirm_password')
            ->press('Submit')
            ->followRedirects();
        $this->seePageIs('/operator/' . $user->id . '/edit')->see('Operator updated successfully');
        $user = App\User::find($user->id);
        $this->assertEquals($newEmail, $user->email);
        $this->assertEquals($newName, $user->name);
    }


}
