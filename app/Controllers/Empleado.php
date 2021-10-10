<?php 
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Empleado extends ResourceController
{
    protected $modelName = 'App\Models\Empleado';
    protected $format    = 'json';

    public function index()
    {
        return $this->genericResponse($this->model->findAll(), null, 200);
    }

    public function create()
    {
        if ($this->validate('employees')) {
            $id = $this->model->insert(array(
                'date_admission' => $this->request->getPost('fecha_ingreso'),
                'name' => $this->request->getPost('nombre'),
                'salary' => $this->request->getPost('salario'),
                'email' => $this->request->getPost('email')
            ));

            return $this->genericResponse($this->model->find($id), null, 200);
        } else {
            $validate = \Config\Services::validation();

            return $this->genericResponse(null, $validate->getErrors(), 500);
        }
    }

    private function genericResponse($data, $msg, $status)
    {
        if ($status === 200) {
            return $this->respond(array(
                'data' => $data,
                'status' => $status
            ));
        } else {
            return $this->respond(array(
                'msg' => $msg,
                'status' => $status
            ));
        }
    }
}