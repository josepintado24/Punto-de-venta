<?php namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $table      = 'ventas';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['folio', 'total','id_usuario','id_caja','id_cliente','forma_pago','envio_nombre','envio_direccion','envio_telefono','envio_costo','otro_detalle','otro_detalle_costo','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function insertaVenta($id_venta,$total, $id_usuario, $id_caja, $id_cliente, $forma_pago,$envio_nombre,$envio_direccion,$envio_telefono,$envio_costo,$otro_detalle,$otro_detalle_costo){
        $this->insert([
            'folio'=>$id_venta,
            'total'=>$total,
            'id_usuario'=>$id_usuario,
            'id_caja'=>$id_caja,
            'id_cliente'=>$id_cliente,
            'forma_pago'=>$forma_pago,
            'envio_nombre'=>$envio_nombre,
            'envio_direccion'=>$envio_direccion,
            'envio_telefono'=>$envio_telefono,
            'envio_costo'=>$envio_costo,
            'otro_detalle'=>$otro_detalle,
            'otro_detalle_costo'=>$otro_detalle_costo
        ]);
        return $this->insertID();
    }
}
