<?php namespace App\Models;

use CodeIgniter\Model;

class ProveedoresModel extends Model
{
    protected $table      = 'proveedores';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'direccion', 'telefono', 'wp', 'correo', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
