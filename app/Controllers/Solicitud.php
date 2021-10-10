<?php 
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Solicitud extends ResourceController
{
    protected $modelName = 'App\Models\Solicitud';
    protected $format    = 'json';

    public function index()
    {
        return $this->genericResponse($this->model->findAll(), null, 200);
    }

    public function create()
    {
        if ($this->validate('solicitud')) {
            
            $id = $this->model->insert(array(
                'codigo' => $this->request->getPost('codigo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'resumen' => $this->request->getPost('resumen'),
                'id_empleado' => $this->request->getPost('id_empleado')
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