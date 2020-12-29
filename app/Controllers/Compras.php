<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprasModel;
use App\Models\TemporalCompraModel;
use App\Models\DetalleCompraModel;
use App\Models\ProductosModel;
use App\Models\ConfiguracionModel;

class Compras extends BaseController{

	protected $compras, $tempral_compra, $detalle_compra, $productos, $configuracion;
	protected $reglas;

	public function __construct(){
		$this->compras=new ComprasModel();
		$this->detalle_compra=new DetalleCompraModel();
		$this->configuracion=new ConfiguracionModel();
		helper(['form']);

		
	}
	public function index($activo=1){
		$compras=$this->compras->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Compras',
			 'datos'=>$compras
		];
		echo view('header');
		echo view('compras/compras',$data);
		echo view('footer');
	}
	public function nuevo(){
		
		echo view('header');
		echo view('compras/nuevo');
		echo view('footer');
	}


	public function guarda(){
		$id_compra=$this->request->getPost('id_compra');
		$total=preg_replace('/[\$,]/','', $this->request->getPost('total'));
		$session=session();
		
		$resultadoId=$this->compras->insertaCompra($id_compra, $total,$session->id_usuario);
		$this->tempral_compra=new TemporalCompraModel();
		

		if($resultadoId){
			$resultadoCompra=$this->tempral_compra->porCompra($id_compra);
			foreach($resultadoCompra as $row){
				$this->detalle_compra->save([
					'id_compra'=>$resultadoId,
					'id_producto'=>$row['id_producto'],
					'nombre'=>$row['nombre'],
					'cantidad'=>$row['cantidad'],
					'precio'=>$row['precio']
				]);
			$this->productos=new ProductosModel();
			$this->productos->actualizaStock($row['id_producto'],$row['cantidad']);	
			}
		$this->tempral_compra->eliminarCompra($id_compra);
		}
		return redirect()->to(base_url()."/compras/muestraCompraPdf/".$resultadoId);
		
	}

	function muestraCompraPdf($id_compra){
		$data['id_compra']= $id_compra;
		echo view ('header');
		echo view ('compras/ver_compra_pdf',$data);
		echo view ('footer');
	}
	function generarCompraPdf($id_compra){
		$datosCompras=$this->compras->where('id',$id_compra)->first();
		$detalle_compra=$this->detalle_compra->select('*')->where('id_compra',$id_compra)->findAll();
		$nombreTienda= $this->configuracion->select('valor')->where('nombre','tienda_nombre')->get()->getRow()->valor;
		$direccionTienda= $this->configuracion->select('valor')->where('nombre','tienda_direccion')->get()->getRow()->valor;
		$pdf=new \FPDF('P','mm', 'letter');
		$pdf->AddPage();
		$pdf->SetMargins(10, 10, 10);
		$pdf->SetTitle("Compras");
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(195,5,"Entrada de productos", 0, 1, 'C');
		$pdf->SetFont('Arial','B', 9);
		$pdf->image(base_url().'/images/logopdf.png',185,10,20,10,'PNG');
		$pdf->Cell(50,5,utf8_decode($nombreTienda), 0, 1, 'L');
		$pdf->Cell(50,5, utf8_decode($direccionTienda), 0, 1, 'L');
		$pdf->Cell(25,5,"Fecha y Hora:", 0, 0, 'L');
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(50,5,$datosCompras['fecha_alta'], 0, 1, 'L');
		$pdf->ln(3);
		$pdf->SetFont('Arial','B', 8);
		$pdf->setFillColor(0,0,0);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(196,5,'Detalle de producto',1,1,'C',1);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell(14,5,'No',1,0,'L');
		$pdf->Cell(25,5,utf8_decode('código'),1,0,'L');
		$pdf->Cell(77,5,'Nombre',1,0,'L');
		$pdf->Cell(25,5,'Precio',1,0,'L');
		$pdf->Cell(25,5,'Cantidad',1,0,'L');
		$pdf->Cell(30,5,'Importe',1,1,'L');
		$pdf->SetFont('Arial','', 8);

		$contador=1;
		foreach($detalle_compra as $row){
			$pdf->Cell(14,5,$contador,1,0,'L');
			$pdf->Cell(25,5,$row['id_producto'],1,0,'L');
			$pdf->Cell(77,5,utf8_decode($row['nombre']),1,0,'L');
			$pdf->Cell(25,5,'$ '.$row['precio'],1,0,'L');
			$pdf->Cell(25,5,$row['cantidad'],1,0,'L');
			$pdf->Cell(30,5,'$ '.number_format(($row['precio'] * $row['cantidad']),2,'.',','),1,1,'R');
			$contador++;
		}
		$pdf->ln(3);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(196,5,'TOTAL: $ '.number_format($datosCompras['total'],2,'.',','),0,1,'R');
		$this->response->setHeader('content-Type', 'application/pdf');
		$pdf->Output("compra_pdf.pdf", "I");


	}



}















