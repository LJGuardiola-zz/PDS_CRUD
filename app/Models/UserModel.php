<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table                = 'users';
    protected $returnType           = 'App\Entities\User';
    protected $allowedFields        = ['first_name', 'last_name', 'username', 'email', 'password', 'role_id'];

    protected $validationRules      = [
        'first_name'    => 'required|alpha|min_length[3]',
        'last_name'     => 'required|alpha|min_length[3]',
        'username'      => 'required|alpha_dash|min_length[4]|max_length[16]|is_unique[users.username]',
        'email'         => 'required|valid_email|is_unique[users.email]',
        'password'      => 'required|min_length[8]',
        'role_id'       => 'is_not_unique[roles.id]'
    ];
    protected $validationMessages   = [
        'first_name'    => [
            'required'              => 'El nombre es requerido.',
            'alpha'                 => 'El nombre debe contener solo letras.',
            'min_length'            => 'El nombre debe contener un mínimo de 3 caracteres.'
        ],
        'last_name'     => [
            'required'              => 'El apellido es requerido.',
            'alpha'                 => 'El apellido debe contener solo letras.',
            'min_length'            => 'El apellido debe contener un mínimo de 3 caracteres.'
        ],
        'username'      => [
            'required'              => 'El nombre de usuario es requerido.',
            'alpha_dash'            => 'El nombre de usuario debe contener solo caracteres alfanuméricos y guiones.',
            'min_length'            => 'El nombre de usuario debe contener un mínimo de 4 caracteres.',
            'max_length'            => 'El nombre de usuario debe contener un máximo de 16 caracteres.',
            'is_unique'             => 'El nombre de usuario ingresado ya esta en uso.'
        ],
        'email'         => [
            'required'              => 'El email es requerido.',
            'valid_email'           => 'Debe ingresar un email válido.',
            'is_unique'             => 'El email ingresado ya esta en uso.'
        ],
        'password'      => [
            'required'              => 'La contraseña es requerida.',
            'min_length'            => 'La contraseña debe contener un mínimo de 8 caracteres.'
        ],
        'role_id'       => [
            'is_not_unique'         => 'Debe seleccionar un rol válido.'
        ]
    ];

    public function getOne($id)
    {
        return $this
            ->select('users.*, roles.id role_id, roles.name role_name')
            ->join('roles', 'roles.id = users.role_id')
            ->find($id);
    }

    public function getAll($perPage = 8): ?array
    {
        return $this
            ->select('users.*, roles.id role_id, roles.name role_name')
            ->join('roles', 'roles.id = users.role_id')
            ->orderBy('id', 'ASC')
            ->paginate($perPage);
    }

}
