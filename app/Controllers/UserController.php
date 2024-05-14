<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User;

class UserController extends BaseController
{
    use ResponseTrait;

    public function index()
    {

        $model = new User();
        $data['users'] = $model->orderBy('name','ASC')->findAll();
        return view('user_view', $data);
        // return $this->respond($data);

    }

    public function addUser()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        $model = new User();
        $data = [
            'name' => $name,
            'email' => $email
        ];
        $model->insert($data);

        return redirect()->to(base_url('users'));
    }

    public function editUser($id)
    {
        $model = new User();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ];
        $model->update($id, $data);
        
        return redirect()->to(base_url('users'));
    }

    public function destroy($id)
    {
        $model = new User();
        $model->where('id', $id)->delete($id);

        return redirect()->to(base_url('users'));
    }
}
