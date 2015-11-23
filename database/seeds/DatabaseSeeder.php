<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->seedUserTable();

        Model::reguard();
    }

    /**
     *  Add default admin user to DB.
     */
    private function seedUserTable()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->password =  bcrypt(env('PASSWORD_ADMIN', '1234'));

        $user->save();
    }
}
