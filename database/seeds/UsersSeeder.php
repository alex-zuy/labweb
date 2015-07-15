<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->is_admin = true;
        $admin->name = 'Zuy Alexey';
        $admin->email = 'zuy_alexey@mail.ru';
        $admin->password = Hash::make('zuy');
        $admin->save();

        $users = [
            ['Dimon', 'dimon@mail.ru', Hash::make('dimon')],
            ['Anton', 'anton@mail.ru', Hash::make('anton')],
            ['Cripton', 'cripton@mailru', Hash::make('cripton')],
        ];

        foreach($users as $user) {
            $u = new User(array_combine(['name', 'email', 'password'], $user));
            $u->save();
        }
    }
}
