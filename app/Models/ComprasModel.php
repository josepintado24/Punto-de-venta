<?php namespace App\Models;

use CodeIgniter\Model;

class ComprasModel extends Model
{
    protected $table      = 'compras';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['folio', 'total','id_usuario','id_proveedor','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function insertaCompra($id_compra,$total, $id_usuario, $id_proveedor){
        $this->insert([
            'folio'=>$id_compra,
            'total'=>$total,
            'id_usuario'=>$id_usuario,
            'id_proveedor'=>$id_proveedor
        ]);
        return $this->insertID();
    }
    public function obtener($activo=1){
        $this->select('compras.*,u.usuario AS cajero, p.nombre AS proveedor');
        $this->join('usuarios AS u', 'compras.id_usuario=u.id');
        $this->join('proveedores AS p', 'compras.id_proveedor=p.id');
        $this->where('compras.activo', $activo);
        $this->orderBy('compras.fecha_alta', 'DESC');
        $datos=$this->findAll();
        return $datos;
    }
    
}
