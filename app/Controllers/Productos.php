<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\UnidadesModel;

class Productos extends BaseController{

	protected $productos;

	public function __construct(){
		$this->productos=new ProductosModel;
		$this->unidades=new UnidadesModel;

		helper(['form']);

		$this->reglasInsertar=[
			
			'nombre'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'precio_venta'=>[
				'rules'=>'required|decimal',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'decimal'=>'El campo {field} debe ser decimal.'
				]
			],
			'precio_compra'=>[
				'rules'=>'required|decimal',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'decimal'=>'El campo {field} debe ser decimal.'
				]
			],
			'stock_minimo'=>[
				'rules'=>'required|numeric',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'numeric'=>'El campo {field} debe ser entero.'
				]
			],
			'id_unidad'=>[
				'rules'=>'required|numeric',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'numeric'=>'El campo {field} debe ser entero.'
				]
			]

		];
		$this->reglasActualizar=[
			
			'nombre'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'precio_venta'=>[
				'rules'=>'required|decimal',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'decimal'=>'El campo {field} debe ser decimal.'
				]
			],
			'precio_compra'=>[
				'rules'=>'required|decimal',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'decimal'=>'El campo {field} debe ser decimal.'
				]
			],
			'stock_minimo'=>[
				'rules'=>'required|numeric',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'numeric'=>'El campo {field} debe ser entero.'
				]
			],
			'id_unidad'=>[
				'rules'=>'required|numeric',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.',
					'numeric'=>'El campo {field} debe ser entero.'
				]
			]

		];


	}
	public function index($activo=1){
		$productos=$this->productos->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Producto',
			 'datos'=>$productos
		];
		echo view('header');
		echo view('productos/productos', $data);
		echo view('footer');
	}


	public function eliminados($activo=0){
		$productos=$this->productos->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Producto Eliminadas',
			 'datos'=>$productos
		];
		echo view('header');
		echo view('productos/eliminados', $data);
		echo view('footer');
	}

	public function nuevo($activo=1){
		$unidades=$this->unidades->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Agregar producto',
			'unidades'=>$unidades
		];
		echo view('header');
		echo view('productos/nuevo',$data);
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglasInsertar)){
			$this->productos->save([
				'nombre'=>$this->request->getPost('nombre'),
				'precio_venta'=>$this->request->getPost('precio_venta'),
				'precio_compra'=>$this->request->getPost('precio_compra'),
				'stock_minimo'=>$this->request->getPost('stock_minimo'),
				'id_unidad'=>$this->request->getPost('id_unidad')
				]);
			return redirect()->to(base_url().'/productos');	
		}
		else{
			$unidades=$this->unidades->where('activo',1)->findAll();
			$data=[
				'titulo'=>'Agregar producto',
				'unidades'=>$unidades,
				'validation'=>$this->validator
			];
			echo view('header');
			echo view('productos/nuevo',$data);
			echo view('footer');
		}
		
	}

	public function editar($id, $valid=null){
		$unidades=$this->unidades->where('activo',1)->findAll();
		$producto=$this->productos->where('id',$id)->first();
		if ($valid!=null){
			$data=[
			'titulo'=>'Editar producto',
			 'producto'=>$producto,
			 'unidades'=>$unidades,
			 'validation'=>$valid
			];
		}else{
			$data=[
				'titulo'=>'Editar producto',
				 'producto'=>$producto,
				 'unidades'=>$unidades
			];
		}
		
		
		echo view('header');
		echo view('productos/editar',$data);
		echo view('footer');
	}
	public function actualizar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglasActualizar)){
			$this->productos->update(
				$this->request->getPost('id'),
				['nombre'=>$this->request->getPost('nombre'),
				'precio_venta'=>$this->request->getPost('precio_venta'),
				'precio_compra'=>$this->request->getPost('precio_compra'),
				'stock_minimo'=>$this->request->getPost('stock_minimo'),
				'id_unidad'=>$this->request->getPost('id_unidad')]);
				
			return redirect()->to(base_url().'/productos');	
		}else{
			return $this->editar($this->request->getPost('id'),$this->validator);
		}
	}

	public function eliminar($id){
		$this->productos->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/productos');
	}
	public function reingresar($id){
		$this->productos->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/productos/eliminados');
	}

	public function buscarPorNombre($nombre){
		$this->productos->select('*');
		$this->productos->where('nombre', $nombre);
		$this->productos->where('activo', 1);
		$datos=$this->productos->get()->getRow();
		$res['existe']=false;
		$res['datos']='';
		$res['error']='';
		if ($datos){
			$res['datos']=$datos;
			$res['existe']=true;
		}else{
			$res['existe']=false;
			$res['error']='No existe el producto';
		}

		echo json_encode($res);

	}


}
