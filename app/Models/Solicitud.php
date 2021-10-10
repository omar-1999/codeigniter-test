<?php
namespace App\Models;

use CodeIgniter\Model;

class Solicitud extends Model{
    protected $table = 'solicitud';

    protected $primaryKey = 'id';

    protected $allowedFields = ['codigo', 'descripcion', 'resumen', 'id_empleado'];
}