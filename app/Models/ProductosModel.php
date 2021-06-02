<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo', 'nombre', 'precio_venta', 'precio_compra', 'existencia', 'existencia_kg', 'stock_minimo', 'inventariable', 'id_unidad', 'id_categoria', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function actualizaStock($id_producto, $cantidad, $operador = '+'){
       
        if ($id_producto == 76 || $id_producto == 77 || $id_producto == 78) {
            switch ($id_producto) {
                case 76:
                    # bolson de arena
                    $this->set('existencia', "existencia $operador $cantidad", FALSE);
                    $this->where('id', 35) ;
                    $this->update();
                    $this->set('existencia', "existencia $operador $cantidad", FALSE);
                    $this->where('id', 72) ;
                    $this->update();
                    break;
                case 77:
                    # bolson de piedra
                    $this->set('existencia', "existencia $operador $cantidad", FALSE);
                    $this->where('id', 36);
                    $this->update();
                    $this->set('existencia', "existencia $operador $cantidad", FALSE);
                    $this->where('id', 72) ;
                    $this->update();
                    break;
                case 78:
                    # bolson de escombro
                    $this->set('existencia', "existencia $operador $cantidad", FALSE);
                    $this->where('id', 37);
                    $this->update();
                    $this->set('existencia', "existencia $operador $cantidad", FALSE);
                    $this->where('id', 72) ;
                    $this->update();
                    break;
            }
        } else {
            $this->set('existencia', "existencia $operador $cantidad", FALSE);
            $this->where('id', $id_producto);
            $this->update();
        }
    }
}
