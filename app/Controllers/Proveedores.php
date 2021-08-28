<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProveedoresModel;

class Proveedores extends BaseController{

	protected $proveedores;
	protected $reglas;

	public function __construct(){
		$this->proveedores=new ProveedoresModel;
		helper(['form']);

		$this->reglas=[
			'nombre'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'direccion'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
				],
			'telefono'=>[
					'rules'=>'required',
					'errors'=>[
						'required'=>'El campo {field} es obligatorio.'
					]
			]
		];
	}
	public function index($activo=1){
		$proveedores=$this->proveedores->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Proveedores',
			 'datos'=>$proveedores
		];
		echo view('header');
		echo view('proveedores/proveedores', $data);
		echo view('footer');
	}
	public function eliminados($activo=0){
		$proveedores=$this->proveedores->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'proveedores Eliminadas',
			 'datos'=>$proveedores
		];
		echo view('header');
		echo view('proveedores/eliminados', $data);
		echo view('footer');
	}

	public function nuevo(){
		$data=[
			'titulo'=>'Agregar proveedores'
		];
		echo view('header');
		echo view('proveedores/nuevo',$data);
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->proveedores->save([
					'nombre'=>$this->request->getPost('nombre'),
					'direccion'=>$this->request->getPost('direccion'),
					'telefono'=>$this->request->getPost('telefono'),
					'wp'=>$this->request->getPost('wp'),
					'correo'=>$this->request->getPost('correo')
				]);
			return redirect()->to(base_url().'/proveedores');	
		}
		else{
			$data=[
				'titulo'=>'Agregar proveedores',
				'validation'=> $this->validator
			];
			echo view('header');
			echo view('proveedores/nuevo',$data);
			echo view('footer');
		}
		
	}

	public function editar($id, $valid=null){
		$cliente=$this->proveedores->where('id',$id)->first();
		if ($valid != null){
			$data=[
				'titulo'=>'Editar cliente',
				 'validation'=>$valid,
				 'datos'=>$cliente

			];
		}else{
			$data=[
			'titulo'=>'Editar cliente',
			 'datos'=>$cliente
		];
		}
		
		
		echo view('header');
		echo view('proveedores/editar',$data);
		echo view('footer');
	}
	public function actualizar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->proveedores->update(
				$this->request->getPost('id'),
				[
					'nombre'=>$this->request->getPost('nombre'),
					'direccion'=>$this->request->getPost('direccion'),
					'telefono'=>$this->request->getPost('telefono'),
					'wp'=>$this->request->getPost('wp'),
					'correo'=>$this->request->getPost('correo')
				]
			);
		return redirect()->to(base_url().'/proveedores');
		}else{
			return $this->editar($this->request->getPost('id'),$this->validator);
		}
	}
	public function eliminar($id){
		$this->proveedores->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/proveedores');
	}
	public function reingresar($id){
		$this->proveedores->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/proveedores/eliminados');
	}

	public function autocompleteData(){
		$returnData=array();
		$valor=$this->request->getGet('term');
		$proveedores=$this->proveedores->like('nombre', $valor)->where('activo',1)->findAll();
		if(!empty($proveedores)){
			foreach($proveedores as $row){
				$data['id']=$row['id'];
				$data['value']=$row['nombre'];
				$data['email']=$row['correo'];
				$data['telefono']=$row['telefono'];
				$data['wp']=$row['wp'];
				array_push($returnData,$data);

			}
		}
		echo json_encode(($returnData));
	}

	//--------------------------------------------------------------------

}
