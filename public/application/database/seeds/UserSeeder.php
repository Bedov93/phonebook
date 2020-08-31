<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{

    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($j = 0; $j < 2; $j++) {

            $users[] = [
                'login' => $faker->userName,
                'password' => password_hash('test123', PASSWORD_BCRYPT),
                'email' => $faker->email
            ];

            for ($i = 0; $i < 50; $i++) {
                $data[] = [
                    'user_id' => $j + 1,
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->unique()->safeEmail,
                    'phone' => $faker->e164PhoneNumber,
                    'photo' => $faker->imageUrl(80,80)
                ];
            }
        }

        $this->table('users')->insert($users)->save();
        $this->table('contacts')->insert($data)->save();

    }
}
