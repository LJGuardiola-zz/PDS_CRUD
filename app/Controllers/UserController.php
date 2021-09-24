<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{

    protected $modelName = 'App\Models\UserModel';

    public function index()
    {
        $data = [
            'users' => $this->model->getAll(),
            'pager' => $this->model->pager
        ];
        return view('user/list', $data);
    }

    public function show($id = null)
    {
        $user = $this->model->getOne($id);
        if ($user != null) {
            $data = [
                'user' => $user
            ];
            return view('user/detail', $data);
        } else throw PageNotFoundException::forPageNotFound();
    }

    public function new()
    {
        $roles = new RoleModel();
        $data = [
            'roles' => $roles->findAll()
        ];
        return view('user/new', $data);
    }

    public function create()
    {
        $inserted = $this->model->insert(
            $this->getValues()
        );
        if ($inserted) {
            return redirect()
                ->to('users')
                ->with('notify', [
                    'type' => 'success',
                    'message' => 'El usuario se creó exitosamente.'
                ]);
        }
        return redirect()
            ->back()
            ->with('errors', $this->model->validation->getErrors())
            ->withInput();
    }

    public function edit($id = null)
    {
        $user = $this->model->getOne($id);
        if ($user != null) {
            $roles = new RoleModel();
            $data = [
                'user' => $user,
                'roles' => $roles->findAll()
            ];
            return view('user/edit', $data);
        } else throw PageNotFoundException::forPageNotFound();
    }

    public function update($id = null)
    {
        $user = $this->model->getOne($id);
        if ($user != null) {

            $data = $this->getDifferentValues($user);

            if (empty($data)) {
                return redirect()
                    ->to('users/' . $id)
                    ->with('notify', [
                        'type' => 'primary',
                        'message' => 'No se realizó ningún cambio.'
                    ]);
            } else {
                if ($this->model->update($id, $data)) {
                    return redirect()
                        ->to('users/' . $id)
                        ->with('notify', [
                            'type' => 'success',
                            'message' => 'El usuario se modificó exitosamente.'
                        ]);
                }
            }
            return redirect()
                ->back()
                ->with('errors', $this->model->validation->getErrors())
                ->withInput();
        } else throw PageNotFoundException::forPageNotFound();
    }

    public function delete($id = null)
    {
        $userModel = new UserModel();
        if ($userModel->delete($id)) {
            return redirect()
                ->back()
                ->with('notify', [
                    'type' => 'success',
                    'message' => 'El usuario se eliminó exitosamente.'
                ]);
        }
        return redirect()
            ->back()
            ->with('notify', [
                'type' => 'danger',
                'message' => 'El usuario no se pudo eliminar.',
                'duration' => 'fixed'
            ]);
    }

    private function getDifferentValues($user): array
    {
        $data = [];
        $values = $this->getValues();

        if ($user->first_name != $values['first_name'])
            $data['first_name'] = $values['first_name'];

        if ($user->last_name != $values['last_name'])
            $data['last_name'] = $values['last_name'];

        if ($user->username != $values['username'])
            $data['username'] = $values['username'];

        if ($user->email != $values['email'])
            $data['email'] = $values['email'];

        if (!empty($values['password']))
            $data['password'] = $values['password'];

        if ($user->role_id != $values['role_id'])
            $data['role_id'] = $values['role_id'];

        return $data;
    }

    private function getValues(): array {
        return [
            'first_name'    => $this->getValue('first_name'),
            'last_name'     => $this->getValue('last_name'),
            'username'      => $this->getValue('username'),
            'email'         => $this->getValue('email'),
            'password'      => $this->getValue('password'),
            'role_id'       => $this->getValue('role')
        ];
    }

    private function getValue($key): string
    {
        return trim($this->request->getPost($key));
    }

}
