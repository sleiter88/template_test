<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user1 = [
        // 	'name' => 'Ian',
        // 	'email' => 'iankamisama@gmail.com',
        //     'admin' => 1,
        //     'business_id' => 1,
        // 	'password' => Hash::make('123123'),
        //     'role' => 'Super Admin',
        // ];

        // User::create($user1);

        // $user2 = [
        //     'name' => 'Ale',
        //     'email' => 'alejo90103@gmail.com',
        //     'admin' => 1,
        //     'business_id' => 1,
        // 	'password' => Hash::make('123123'),
        //     'role' => 'Super Admin',
        // ];

        // User::create($user2);

        $user3 = [
            'name' => 'Test',
            'email' => 'test@codigomedia.com',
            'admin' => 0,
            'status' => 1,
            'phone' => +346834325698,
            'whatsapp' => 346834325698,
            'skype' => 'test@codigomedia.com',
            'business_id' => 1,
            'password' => Hash::make('CodigoMedia123.'),
            'avatar' => 'https://images-na.ssl-images-amazon.com/images/I/61JVy%2BSjxrL.png',
            'role' => 'Admin',
        ];

        User::create($user3);
    }
}
