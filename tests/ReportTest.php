<?php

class ReportTest extends TestCase
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

    public function testCreateReport()
    {
        $password = $this->faker->password;
        $user     = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'phone'    => $this->faker->phoneNumber,
            'password' => $password,
        ]);
        $patient = App\Role::where('name', 'Patient')->first();
        $user->attachRole($patient);

        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/report/add')
            ->press('Submit')
            ->see('The patient field is required.')
            ->see('The clinical history field is required.')
            ->see('The specimen field is required.')
            ->see('The diagnosis field is required.')
            ->see('The gross description field is required.')
            ->type($user->id, 'patient')
            ->type('large gastric mass', 'clinical_history')
            ->type('gastric mucosa', 'specimen')
            ->type('this is test diagnosis', 'diagnosis')
            ->type('this is test gross description', 'gross_description')
            ->press('Submit')
            ->see('Report added successfully')
            ->dontSee('Whoops! Something went wrong!')
            ->assertSessionHas('flash');
    }

    public function testEditReport()
    {
        $password = $this->faker->password;
        $user     = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'phone'    => $this->faker->phoneNumber,
            'password' => $password
        ]);
        $patient = App\Role::where('name', 'Patient')->first();
        $user->attachRole($patient);

        $report = App\Report::create([
            'patient_id'    => $user->id,
            'clinical_history'  => implode(' ', $this->faker->words(5)),
            'specimen'  => implode(' ', $this->faker->words(5)),
            'diagnosis'   => implode(' ', $this->faker->words(20)),
            'gross_description' => implode(' ', $this->faker->words(30)),
        ]);

        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/report/' . $report->id . '/edit')
            ->type($user->id, 'patient')
            ->type('edited clinical history', 'clinical_history')
            ->type('edited specimen', 'specimen')
            ->type('edited diagnosis', 'diagnosis')
            ->type('edited gross desription', 'gross_description')
            ->press('Update')
           ->followRedirects();
    }

    public function testViewReport()
    {
        $password = $this->faker->password;
        $user     = App\User::create([
            'name'     => $this->faker->name,
            'email'    => $this->faker->email,
            'phone'    => $this->faker->phoneNumber,
            'password' => $password
        ]);
        $patient = App\Role::where('name', 'Patient')->first();
        $user->attachRole($patient);

        $report = App\Report::create([
            'patient_id'    => $user->id,
            'clinical_history'  => implode(' ', $this->faker->words(5)),
            'specimen'  => implode(' ', $this->faker->words(5)),
            'diagnosis'   => implode(' ', $this->faker->words(20)),
            'gross_description' => implode(' ', $this->faker->words(30)),
        ]);

        $this->visit('/login')
            ->type('operator@mail.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->visit('/report/' . $report->id . '/detail')
           	->see($report->clinical_history)
           	->see($report->specimen)
           	->see($report->diagnosis)
           	->see($report->gross_description);
    }
}
