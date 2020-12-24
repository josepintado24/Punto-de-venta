<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VentasModel;
use App\Models\TemporalCompraModel;
use App\Models\DetalleVentaModel;
use App\Models\ProductosModel;

class Ventas extends BaseController{

	protected $ventas, $tempral_compra, $detalle_venta, $productos;

	public function __construct(){
		$this->ventas=new VentasModel();
		$this->detalle_venta=new DetalleVentaModel();
		helper(['form']);
	}
	public function index($activo=1){
		$ventas=$this->ventas->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'ventas',
			 'datos'=>$ventas
		];
		echo view('header');
		echo view('ventas/ventas',$data);
		echo view('footer');
	}

	public function venta(){
		echo view('header');
		echo view('ventas/caja');
		echo view('footer');
	}


	public function guarda(){
		$id_venta=$this->request->getPost('id_venta');
		$total=preg_replace('/[\$,]/','', $this->request->getPost('total'));
		$forma_pago= $this->request->getPost('forma_pago');
		$id_cliente= $this->request->getPost('id_cliente');
		$session=session();
		$resultadoId=$this->ventas->insertaVenta($id_venta, $total,$session->id_usuario,$session->id_caja, $id_cliente, $forma_pago);
		$this->tempral_compra=new TemporalCompraModel();
		if($resultadoId){
			$resultadoCompra=$this->tempral_compra->porCompra($id_venta);
			foreach($resultadoCompra as $row){
				$this->detalle_venta->save([
					'id_venta'=>$resultadoId,
					'id_producto'=>$row['id_producto'],
					'nombre'=>$row['nombre'],
					'cantidad'=>$row['cantidad'],
					'precio'=>$row['precio']
				]);
			$this->productos=new ProductosModel();
			$this->productos->actualizaStock($row['id_producto'],$row['cantidad'],'-');
			}
		$this->tempral_compra->eliminarCompra($id_venta);
		}
		return redirect()->to(base_url()."/ventas/muestraTicketPdf/".$resultadoId);
	}

	function muestraTicketPdf($id_venta){
		$data['id_venta']= $id_venta;
		echo view ('header');
		echo view ('ventas/ver_ticket_pdf',$data);
		echo view ('footer');
	}
	function generarTicketPdf($id_venta){
		$datosventa=$this->ventas->where('id',$id_venta)->first();
		$detalle_venta=$this->detalle_venta->select('*')->where('id_venta',$id_venta)->findAll();
		$pdf=new \FPDF('P','mm', array(80, 200));
		$pdf->AddPage();
		$pdf->SetMargins(5, 5, 5);
		$pdf->SetTitle("venta");
		$pdf->SetFont('Arial','B', 10);

		$pdf->Cell(70,5,"Nombre Tienda", 0, 1, 'C');
		$pdf->SetFont('Arial','B', 7);
		$pdf->image(base_url().'/images/logopdf.png',5,5,20,10,'PNG');
		$pdf->Cell(70,5, utf8_decode('Av Jose Jose'), 0, 1, 'C');
		$pdf->Cell(25,5,"Fecha y Hora:", 0, 0, 'L');
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(50,5,$datosventa['fecha_alta'], 0, 1, 'L');
		$pdf->SetFont('Arial','B', 9);
		$pdf->Cell(25,5,utf8_decode('Ticket: '), 0, 0, 'L');
		$pdf->SetFont('Arial','', 9);
		$pdf->Cell(50,5,$datosventa['folio'], 0, 1, 'L');
		$pdf->ln();
		$pdf->SetFont('Arial','B', 7);
		$pdf->Cell(7,5,'Cant.',0,0,'L');
		$pdf->Cell(35,5,'Nombre',0,0,'L');
		$pdf->Cell(15,5,'Precio',0,0,'L');
		$pdf->Cell(15,5,'Importe',0,1,'L');
		$pdf->SetFont('Arial','', 8);
		foreach($detalle_venta as $row){
			$pdf->Cell(7,5,$row['cantidad'],0,0,'L');
			$pdf->Cell(35,5,utf8_decode($row['nombre']),0,0,'L');
			$pdf->Cell(15,5,'$ '.$row['precio'],0,0,'L');
			$pdf->Cell(15,5,'$ '.number_format(($row['precio'] * $row['cantidad']),2,'.',','),0,1,'R');
		}
		$pdf->ln(3);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(70,5,'TOTAL: $ '.number_format($datosventa['total'],2,'.',','),0,1,'R');
		$this->response->setHeader('content-Type', 'application/pdf');
		$pdf->Output("ticket.pdf", "I");


	}



}















