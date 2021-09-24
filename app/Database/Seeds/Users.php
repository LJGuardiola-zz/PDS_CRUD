<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $this->db->table('roles')->insertBatch([
            [
                'name' => 'Administrador',
            ],
            [
                'name' => 'Ciudadano'
            ]
        ]);

        $model = model('UserModel');

        $model->insert([
            'first_name' => 'Homero',
            'last_name' => 'Simpson',
            'username' => 'hSimpson',
            'email' => 'hsimpson@crud.test',
            'password' => '12345678',
            'role_id' => 1,
        ]);

        for ($i = 0; $i < 100; $i++) {

            $first_name = static::faker()->firstName;
            $last_name = static::faker()->lastName;
            $username = substr($first_name, 0, 1) . $last_name . $i;

            $model->insert([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $username . '@' . static::faker()->freeEmailDomain,
                'password' => '12345678',
                'role_id' => 2,
            ]);
        }
    }
}
