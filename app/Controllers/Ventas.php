<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentasModel;
use App\Models\TemporalCompraModel;
use App\Models\DetalleVentaModel;
use App\Models\ProductosModel;
use App\Models\ConfiguracionModel;
use App\Models\ClientesModel;

class Ventas extends BaseController
{

	protected $ventas, $tempral_compra, $detalle_venta, $productos, $configuracion, $clientes, $session;
	public function __construct()
	{
		$this->ventas = new VentasModel();
		$this->detalle_venta = new DetalleVentaModel();
		$this->configuracion = new ConfiguracionModel();
		$this->productos = new ProductosModel();
		$this->session=session();
		helper(['form']);
	}
	public function index()
	{
		if (!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
		$datos = $this->ventas->obtener();
		$data = [
			'titulo' => 'Ventas',
			'datos' => $datos
		];
		echo view('header');
		echo view('ventas/ventas', $data);
		echo view('footer');
	}
	public function venta()
	{
		if (!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
		$data = [
			'titulo' => 'Vender'
		];
		echo view('header');
		echo view('ventas/caja',$data);
		echo view('footer');
	}
	public function guarda()
	{
		if (!isset($this->session->id_usuario)){
			return redirect()->to(base_url());
		}
		$activado_costo = $this->request->getPost('activado_costo');
		$descuento = $this->request->getPost('descuento');
		$id_venta = $this->request->getPost('id_venta');
		$total = preg_replace('/[\$,]/', '', $this->request->getPost('total'));
		$forma_pago = $this->request->getPost('forma_pagos');
		$id_cliente = $this->request->getPost('id_cliente');
		// 'envio_nombre','envio_direccion','envio_telefono','envio_costo','otro_detalle','otro_detalle_costo'
		$envio_nombre = $this->request->getPost('envio_nombre');
		$envio_direccion = $this->request->getPost('envio_direccion');
		$envio_telefono = $this->request->getPost('envio_telefono');
		$envio_costo = $this->request->getPost('envio_costo');
		$otro_detalle = $this->request->getPost('otro_detalle');
		$otro_detalle_costo = $this->request->getPost('otro_detalle_costo');
		$session = session();
		$resultadoId = $this->ventas->insertaVenta($id_venta, $total, $session->id_usuario, $session->id_caja, $id_cliente, $forma_pago, $envio_nombre, $envio_direccion, $envio_telefono, $envio_costo, $otro_detalle, $otro_detalle_costo, $descuento);
		$this->tempral_compra = new TemporalCompraModel();
		if ($resultadoId) {
			$resultadoCompra = $this->tempral_compra->porCompra($id_venta);
			foreach ($resultadoCompra as $row) {
				$this->detalle_venta->save([
					'id_venta' => $resultadoId,
					'id_producto' => $row['id_producto'],
					'nombre' => $row['nombre'],
					'cantidad' => $row['cantidad'],
					'precio' => $row['precio'],
					'adicional' => $row['adicional']
				]);
				$this->productos = new ProductosModel();
				$this->productos->actualizaStock($row['id_producto'], $row['cantidad'], '-');
			}
			$this->tempral_compra->eliminarCompra($id_venta);
		}
		return redirect()->to(base_url() . "/ventas/muestraTicketPdf/" . $resultadoId);
	}
	function muestraTicketPdf($id_venta)
	{
		$data['id_venta'] = $id_venta;
		echo view('header');
		echo view('ventas/ver_ticket_pdf', $data);
		echo view('footer');
	}
	function generarTicketPdf($id_venta)
	{
		$this->clientes = new ClientesModel();
		$datosventa = $this->ventas->where('id', $id_venta)->first();
		$detalle_venta = $this->detalle_venta->select('*')->where('id_venta', $id_venta)->findAll();
		$nombreTienda = $this->configuracion->select('valor')->where('nombre', 'tienda_nombre')->get()->getRow()->valor;
		$direccionTienda = $this->configuracion->select('valor')->where('nombre', 'tienda_direccion')->get()->getRow()->valor;
		$ticket_leyenda = $this->configuracion->select('valor')->where('nombre', 'ticket_leyenda')->get()->getRow()->valor;
		$tienda_email = $this->configuracion->select('valor')->where('nombre', 'tienda_email')->get()->getRow()->valor;
		$tienda_telefono = $this->configuracion->select('valor')->where('nombre', 'tienda_telefono')->get()->getRow()->valor;
		$ticket_wp = $this->configuracion->select('valor')->where('nombre', 'ticket_wp')->get()->getRow()->valor;
		$cliente = $this->clientes->where('id', $datosventa['id_cliente'])->first();
		$pdf = new \FPDF('P', 'mm', array(80, 200));
		$pdf->AddPage();
		$pdf->SetMargins(5, 5, 5);
		$pdf->SetTitle("venta");
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->ln(3);
		// $pdf->Cell(70, 5, utf8_decode($nombreTienda), 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->image(base_url() . '/public/assets/img/brand/negro.png', 23, 5, 30, 10, 'PNG');
		$pdf->Cell(70, 5, utf8_decode($direccionTienda), 0, 1, 'C');
		$pdf->MultiCell(70, 4, "whatsapp: " . utf8_decode($ticket_wp), 0, 'C', 0);
		$pdf->MultiCell(70, 4, "telefono: " . utf8_decode($tienda_telefono), 0, 'C', 0);
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(25, 5, utf8_decode('Ticket: '), 0, 0, 'L');
		$pdf->SetFont('Arial', '', 9);
		$pdf->Cell(50, 5, $datosventa['folio'], 0, 1, 'L');
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->Cell(25, 5, "Fecha y Hora:", 0, 0, 'L');
		$pdf->SetFont('Arial', '', 7);
		$pdf->Cell(50, 5, $datosventa['fecha_alta'], 0, 1, 'L');
		if ($cliente['nombre']) {
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('Cliente: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(50, 5, utf8_decode($cliente['nombre']), 0, 1, 'L');
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('Teléfono: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(50, 5, $cliente['telefono'], 0, 1, 'L');
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('Direccón: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->MultiCell(50, 5, utf8_decode($cliente['direccion']), 0, 'L', 0);
		} else {
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('Cliente: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->Cell(50, 5, utf8_decode('Público en general'), 0, 1, 'L');
		}
		//envio
		if ($datosventa['envio_costo'] > 0) {
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('ENVIO: '), 0, 1, 'L');
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('Nombre: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->MultiCell(50, 5, utf8_decode($datosventa['envio_nombre']), 0, 'L', 0);
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('Direccón: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->MultiCell(50, 5, utf8_decode($datosventa['envio_direccion']), 0, 'L', 0);
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('teléfono: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->MultiCell(50, 5, utf8_decode($datosventa['envio_telefono']), 0, 'L', 0);
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('costo: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->MultiCell(50, 5, utf8_decode($datosventa['envio_costo']), 0, 'L', 0);
		}
		if ($datosventa['otro_detalle_costo'] > 0) {
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('Otro: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->MultiCell(50, 5, utf8_decode($datosventa['otro_detalle']), 0, 'L', 0);
			$pdf->SetFont('Arial', 'B', 7);
			$pdf->Cell(25, 5, utf8_decode('costo: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 7);
			$pdf->MultiCell(50, 5, utf8_decode($datosventa['otro_detalle_costo']), 0, 'L', 0);
		}
		$pdf->ln();
		$pdf->SetFont('Arial', 'B', 5);
		$pdf->Cell(5, 5, 'Cant.', 0, 0, 'L');
		$pdf->Cell(30, 5, 'Nom', 0, 0, 'L');
		$pdf->Cell(12, 5, 'Precio', 0, 0, 'L');
		$pdf->Cell(12, 5, 'Ads', 0, 0, 'L');
		$pdf->Cell(12, 5, 'Importe', 0, 1, 'L');
		$pdf->SetFont('Arial', '', 5);


		foreach ($detalle_venta as $row) {
			if ($row['cantidad'] < 1) {
				$pdf->Cell(5, 5, intval($row['cantidad']), 0, 0, 'L');
				$pdf->Cell(30, 5, utf8_decode($row['nombre']), 0, 0, 'L');
				$pdf->Cell(12, 5, '------', 0, 0, 'L');
				$pdf->Cell(12, 5, '------', 0, 0, 'L');
				$pdf->Cell(10, 5, '$ ' . number_format((($row['precio'] * $row['cantidad']) + $row['adicional']), 2, '.', ','), 0, 1, 'R');
			} else {
				$pdf->Cell(5, 5,intval($row['cantidad']), 0, 0, 'L');
				$pdf->Cell(30, 5, utf8_decode($row['nombre']), 0, 0, 'L');
				$pdf->Cell(12, 5, '$ ' . $row['precio'], 0, 0, 'L');
				$pdf->Cell(12, 5, '$ ' . $row['adicional'], 0, 0, 'L');
				$pdf->Cell(10, 5, '$ ' . number_format((($row['precio'] * $row['cantidad']) + $row['adicional']), 2, '.', ','), 0, 1, 'R');
			}


			// foreach ($detalle_venta as $row) {
			// 	$pdf->Cell(7, 5, $row['cantidad'], 0, 0, 'L');
			// 	$pdf->Cell(35, 5, utf8_decode($row['nombre']), 0, 0, 'L');
			// 	$pdf->Cell(15, 5, '$ ' . $row['precio'], 0, 0, 'L');
			// 	$pdf->Cell(15, 5, '$ ' . number_format(($row['precio'] * $row['cantidad']), 2, '.', ','), 0, 1, 'R');
			// }
		}
		$pdf->ln(3);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(70, 5, 'TOTAL: $ ' . number_format($datosventa['total'], 2, '.', ','), 0, 1, 'R');
		$pdf->Cell(70, 5, 'ENVIO: $ ' . number_format($datosventa['envio_costo'], 2, '.', ','), 0, 1, 'R');
		$pdf->Cell(70, 5, 'OTRO: $ ' . number_format($datosventa['otro_detalle_costo'], 2, '.', ','), 0, 1, 'R');
		$pdf->Cell(70, 5, 'PGAR: $ ' . number_format($datosventa['envio_costo'] + $datosventa['otro_detalle_costo'] + $datosventa['total'], 2, '.', ','), 0, 1, 'R');

		if ($datosventa['descuento'] > 0) {
			$pdf->Cell(70, 5, '-----------------', 0, 1, 'R');
			$pdf->Cell(70, 5, 'DESC.:- $ ' . number_format($datosventa['descuento'], 2, '.', ','), 0, 1, 'R');
			$pdf->Cell(70, 5, 'TOTAL PGAR: $ ' . number_format(($datosventa['envio_costo'] + $datosventa['otro_detalle_costo'] + $datosventa['total']) - $datosventa['descuento'], 2, '.', ','), 0, 1, 'R');
		}

		$pdf->ln(1);
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->MultiCell(70, 4, utf8_decode($ticket_leyenda), 0, 'C', 0);
		$pdf->MultiCell(70, 4, utf8_decode($tienda_email), 0, 'C', 0);

		$this->response->setHeader('content-Type', 'application/pdf');
		$pdf->Output("ticket.pdf", "I");
	}
	public function eliminar($id)
	{
		$productos = $this->detalle_venta->where('id_venta', $id)->findAll();
		foreach ($productos as $producto) {
			$this->productos->actualizaStock($producto['id_producto'], $producto['cantidad'], '+');
		}
		$this->ventas->update($id, ['activo' => 0]);
		return  redirect()->to(base_url() . '/ventas');
	}

	public function eliminados()
	{
		$datos = $this->ventas->obtener(0);
		$data = [
			'titulo' => 'Ventas elimianadas',
			'datos' => $datos
		];
		echo view('header');
		echo view('ventas/eliminados', $data);
		echo view('footer');
	}
}
