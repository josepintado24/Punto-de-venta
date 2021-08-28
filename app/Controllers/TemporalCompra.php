<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TemporalCompraModel;
use App\Models\ProductosModel;
// use App\Models\UnidadesModel;

class TemporalCompra extends BaseController
{

	protected $temporal_compra, $productos;


	public function __construct()
	{
		$this->temporal_compra = new TemporalCompraModel;
		$this->productos = new ProductosModel;
		// $this->unidades = new UnidadesModel;
	}


	public function inserta($id_producto, $cantidad, $id_compra,$destino)
	{
		$error = '';
		$producto = $this->productos->where('id', $id_producto)->first();
		if ($producto) {
			$datosExisten = $this->temporal_compra->porIdProductoCompra($id_producto, $id_compra);
			if ($datosExisten) {
				$cantidad = $datosExisten->cantidad + $cantidad;
				$subtotal = $cantidad * $datosExisten->precio;
				$this->temporal_compra->actualizarProductoCompra($id_producto, $id_compra, $cantidad, $subtotal);
			} else {
				$subtotal = $cantidad * $producto['precio_compra'];
				$this->temporal_compra->save([
					'folio' => $id_compra,
					'id_producto' => $id_producto,
					'codigo' => $producto['codigo'],
					'precio' => $producto['precio_compra'],
					'nombre' => $producto['nombre'],
					'cantidad' => $cantidad,
					'subtotal' => $subtotal,

				]);
			}
		} else {
			$error = 'No existe el producto';
		}
		$res['datos'] = $this->cargarProductos($id_compra,$destino);
		$res['error'] = $error;
		$res['total'] = number_format($this->totalProductos($id_compra), 2, '.', ',');
		echo json_encode($res);
	}

	public function insertaVenta($id_producto, $cantidad, $id_compra, $adicional)
	{
		$error = '';
		$producto = $this->productos->where('id', $id_producto)->first();
		$bolson = $this->productos->where('id', 72)->first();
		$arena = $this->productos->where('id', 35)->first();
		$piedra = $this->productos->where('id', 36)->first();
		$escombro = $this->productos->where('id', 37)->first();
		$b_arena = 0;
		$arena['existencia'];
		$b_piedra = $this->productos->where(77, $id_producto)->first();
		$b_escombro = $this->productos->where(78, $id_producto)->first();
		if ($producto) {
			if ($id_producto == 76 || $id_producto == 77 || $id_producto == 78) {
				$datosExisten = $this->temporal_compra->porIdProductoCompra($id_producto, $id_compra);
				if ($datosExisten) {
					switch ($id_producto) {
						case 76:
							# bolson de arena
							if ($bolson['existencia'] > $arena['existencia']) {
								$b_arena = number_format($bolson['existencia'] - ($bolson['existencia'] - $arena['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] < $arena['existencia']) {
								$b_arena = number_format($arena['existencia'] - ($arena['existencia'] - $bolson['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] == $arena['existencia']) {
								$b_arena = number_format($bolson['existencia'], 0, '.', ',');
							}
							if ($b_arena >= $datosExisten->cantidad + $cantidad) {
								$cantidad = $datosExisten->cantidad + $cantidad;
								$subtotal = $cantidad * $datosExisten->precio;
								$this->temporal_compra->actualizarProductoCompra($id_producto, $id_compra, $cantidad, $subtotal);
							} else {
								$error = 'stock insuficiente';
							}
							break;
						case 77:
							# bolson de piedra
							if ($bolson['existencia'] > $piedra['existencia']) {
								$b_piedra = number_format($bolson['existencia'] - ($bolson['existencia'] - $piedra['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] < $piedra['existencia']) {
								$b_piedra = number_format($piedra['existencia'] - ($piedra['existencia'] - $bolson['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] == $piedra['existencia']) {
								$b_piedra = number_format($bolson['existencia'], 0, '.', ',');
							}
							if ($b_piedra >= $datosExisten->cantidad + $cantidad) {
								$cantidad = $datosExisten->cantidad + $cantidad;
								$subtotal = $cantidad * $datosExisten->precio;
								$this->temporal_compra->actualizarProductoCompra($id_producto, $id_compra, $cantidad, $subtotal);
							} else {
								$error = 'stock insuficiente';
							}
							break;
						case 78:
							# bolson de escombro
							if ($bolson['existencia'] > $escombro['existencia']) {
								$b_escombro = number_format($bolson['existencia'] - ($bolson['existencia'] - $escombro['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] < $escombro['existencia']) {
								$b_escombro = number_format($escombro['existencia'] - ($escombro['existencia'] - $bolson['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] == $escombro['existencia']) {
								$b_escombro = number_format($bolson['existencia'], 0, '.', ',');
							}
							if ($b_escombro >= $datosExisten->cantidad + $cantidad) {
								$cantidad = $datosExisten->cantidad + $cantidad;
								$subtotal = $cantidad * $datosExisten->precio;
								$this->temporal_compra->actualizarProductoCompra($id_producto, $id_compra, $cantidad, $subtotal);
							} else {
								$error = 'stock insuficiente';
							}
							break;
					}
				} else {
					switch ($id_producto) {
						case 76:
							# bolson de arena
							if ($bolson['existencia'] > $arena['existencia']) {
								$b_arena = number_format($bolson['existencia'] - ($bolson['existencia'] - $arena['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] < $arena['existencia']) {
								$b_arena = number_format($arena['existencia'] - ($arena['existencia'] - $bolson['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] == $arena['existencia']) {
								$b_arena = number_format($bolson['existencia'], 0, '.', ',');
							}
							if ($b_arena >= $cantidad) {
								$subtotal = ($cantidad * $producto['precio_venta']) + $adicional;
								$this->temporal_compra->save([
									'folio' => $id_compra,
									'id_producto' => $id_producto,
									'codigo' => $producto['codigo'],
									'precio' => $producto['precio_venta'],
									'nombre' => $producto['nombre'],
									'cantidad' => $cantidad,
									'subtotal' => $subtotal,
									'adicional' => $adicional,
								]);
							} else {
								$error = 'stock insuficiente';
							}

							break;
						case 77:
							# bolson de piedra
							if ($bolson['existencia'] > $piedra['existencia']) {
								$b_piedra = number_format($bolson['existencia'] - ($bolson['existencia'] - $piedra['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] < $piedra['existencia']) {
								$b_piedra = number_format($piedra['existencia'] - ($piedra['existencia'] - $bolson['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] == $piedra['existencia']) {
								$b_piedra = number_format($bolson['existencia'], 0, '.', ',');
							}
							if ($b_piedra >= $cantidad) {
								$subtotal = ($cantidad * $producto['precio_venta']) + $adicional;
								$this->temporal_compra->save([
									'folio' => $id_compra,
									'id_producto' => $id_producto,
									'codigo' => $producto['codigo'],
									'precio' => $producto['precio_venta'],
									'nombre' => $producto['nombre'],
									'cantidad' => $cantidad,
									'subtotal' => $subtotal,
									'adicional' => $adicional,
								]);
							} else {
								$error = 'stock insuficiente';
							}
							break;
						case 78:
							# bolson de escombro
							if ($bolson['existencia'] > $escombro['existencia']) {
								$b_escombro = number_format($bolson['existencia'] - ($bolson['existencia'] - $escombro['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] < $escombro['existencia']) {
								$b_escombro = number_format($escombro['existencia'] - ($escombro['existencia'] - $bolson['existencia']), 0, '.', ',');
							} elseif ($bolson['existencia'] == $escombro['existencia']) {
								$b_escombro = number_format($bolson['existencia'], 0, '.', ',');
							}
							if ($b_escombro >= $cantidad) {
								$subtotal = ($cantidad * $producto['precio_venta']) + $adicional;
								$this->temporal_compra->save([
									'folio' => $id_compra,
									'id_producto' => $id_producto,
									'codigo' => $producto['codigo'],
									'precio' => $producto['precio_venta'],
									'nombre' => $producto['nombre'],
									'cantidad' => $cantidad,
									'subtotal' => $subtotal,
									'adicional' => $adicional,
								]);
							} else {
								$error = 'stock insuficiente';
							}
							break;
					}
				}
			} else {
				$datosExisten = $this->temporal_compra->porIdProductoCompra($id_producto, $id_compra);

				if ($datosExisten) {
					if ($producto['existencia'] >= $datosExisten->cantidad + $cantidad) {
						$cantidad = $datosExisten->cantidad + $cantidad;
						$subtotal = $cantidad * $datosExisten->precio;
						$this->temporal_compra->actualizarProductoCompra($id_producto, $id_compra, $cantidad, $subtotal);
					} else {
						$error = 'stock insuficiente';
					}
				} else {
					if ($producto['existencia'] >= $cantidad) {
						$subtotal = ($cantidad * $producto['precio_venta']) + $adicional;
						$this->temporal_compra->save([
							'folio' => $id_compra,
							'id_producto' => $id_producto,
							'codigo' => $producto['codigo'],
							'precio' => $producto['precio_venta'],
							'nombre' => $producto['nombre'],
							'cantidad' => $cantidad,
							'subtotal' => $subtotal,
							'adicional' => $adicional,

						]);
					} else {
						$error = 'stock insuficiente';
					}
				}
			}
		} else {
			$error = 'No existe el producto';
		}
		$res['datos'] = $this->cargarProductosVenta($id_compra);
		$res['error'] = $error;
		$res['total'] = number_format($this->totalProductos($id_compra), 2, '.', ',');
		echo json_encode($res);
	}


	public function cargarProductosVenta($id_compra)
	{
		$resultado = $this->temporal_compra->porCompra($id_compra);
		$fila = '';
		$numFila = 0;
		foreach ($resultado as $row) {
			$numFila++;
			$fila .= "<tr id='fila" . $numFila . "'>";
			$fila .= "<td>" . $numFila . "</td>";
			$fila .= "<td>" . $row['nombre'] . "</td>";
			$fila .= "<td>" . number_format($row['precio'], 2, '.', ',') . "</td>";
			$producto = $this->productos->where('id', $row['id_producto'])->first();
			if ($producto['id_unidad']==4){
				$fila .= "<td>" . intval($row['cantidad']). "</td>";
			}else{

				$fila .= "<td>" . $row['cantidad']. "</td>";
			}
			$fila .= "<td>" .  number_format($row['adicional'], 2, '.', ',') . "</td>";
			$fila .= "<td>" . number_format($row['subtotal'], 2, '.', ',') . "</td>";
			$fila .= "<td><a onclick=\"eliminaProducto(" . $row['id_producto'] . ",'" . $id_compra . "')\" class='borrar btn btn-sm btn-neutral'><span class='fas fa-fw fa-trash'></span></a></td>";

			$fila .= "</tr>";
		}
		return $fila;
	}
	public function cargarProductos($id_compra, $destino="ventas")
	{
		$resultado = $this->temporal_compra->porCompra($id_compra);
		$fila = '';
		$numFila = 0;
		foreach ($resultado as $row) {
			
			$numFila++;
			$fila .= "<tr id='fila" . $numFila . "'>";
			$fila .= "<td>" . $numFila . "</td>";
			$fila .= "<td>" . $row['nombre'] . "</td>";
			$fila .= "<td>" . number_format($row['precio'], 2, '.', ',') . "</td>";
			$producto = $this->productos->where('id', $row['id_producto'])->first();
			if ($producto['id_unidad']==4){
				$fila .= "<td>" . intval($row['cantidad']). "</td>";
			}else{

				$fila .= "<td>" . $row['cantidad']. "</td>";
			}
			if ($destino=="ventas"){
				$fila .= "<td>" . number_format($row['adicional'], 2, '.', ','). "</td>";
			}else{

			}
			
			$fila .= "<td>" . number_format($row['subtotal']+$row['adicional'], 2, '.', ',') . "</td>";
			$fila .= "<td><a onclick=\"eliminaProducto(" . $row['id_producto'] . ",'" . $id_compra . "')\" class='borrar btn btn-sm btn-neutral'><span class='fas fa-fw fa-trash'></span></a></td>";

			$fila .= "</tr>";
		}
		return $fila;
	}

	public function totalProductos($id_compra)
	{
		$resultado = $this->temporal_compra->porCompra($id_compra);

		$total = 0;
		foreach ($resultado as $row) {
			$total += $row['subtotal'];
		}
		return $total;
	}
	public function eliminar($id_producto, $id_compra,$destino)
	{
		$datosExisten = $this->temporal_compra->porIdProductoCompra($id_producto, $id_compra);
		if ($datosExisten) {
			if ($datosExisten->cantidad > 1) {
				$cantidad = $datosExisten->cantidad - 1;
				$subtotal = $cantidad * $datosExisten->precio;
				$this->temporal_compra->actualizarProductoCompra($id_producto, $id_compra, $cantidad, $subtotal);
			} else {
				$this->temporal_compra->eliminarProductoCompra($id_producto, $id_compra);
			}
		}

		$res['datos'] = $this->cargarProductos($id_compra,$destino);
		$res['error'] = '';
		$res['total'] = number_format($this->totalProductos($id_compra), 2, '.', ',');
		echo json_encode($res);
	}
	//--------------------------------------------------------------------

}
