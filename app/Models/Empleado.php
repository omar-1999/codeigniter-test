<?php
namespace App\Models;

use CodeIgniter\Model;

class Empleado extends Model{
    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $allowedFields = ['date_admission', 'name', 'salary', 'email'];
}