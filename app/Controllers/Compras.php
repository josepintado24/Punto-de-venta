<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprasModel;

class Compras extends BaseController{

	protected $Compras;
	protected $reglas;

	public function __construct(){
		$this->Compras=new ComprasModel;
		helper(['form']);

		
	}
	public function index($activo=1){
		$Compras=$this->Compras->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Compras',
			 'datos'=>$Compras
		];
		echo view('header');
		echo view('Compras/Compras', $data);
		echo view('footer');
	}
	public function eliminados($activo=0){
		$Compras=$this->Compras->where('activo',$activo)->findAll();
		$data=[
			'titulo'=>'Compras Eliminadas',
			 'datos'=>$Compras
		];
		echo view('header');
		echo view('Compras/eliminados', $data);
		echo view('footer');
	}

	public function nuevo(){
		
		echo view('header');
		echo view('Compras/nuevo');
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->Compras->save([
				'nombre'=>$this->request->getPost('nombre'),
				'nombre_corto'=>$this->request->getPost('nombre_corto')
				]);
			return redirect()->to(base_url().'/Compras');	
		}
		else{
			$data=[
				'titulo'=>'Agregar Compras',
				'validation'=> $this->validator
			];
			echo view('header');
			echo view('Compras/nuevo',$data);
			echo view('footer');
		}
		
	}

	public function editar($id, $valid=null){
		$Compra=$this->Compras->where('id',$id)->first();
		if ($valid != null){
			$data=[
				'titulo'=>'Editar Compra',
				 'validation'=>$valid,
				 'datos'=>$Compra

			];
		}else{
			$data=[
			'titulo'=>'Editar Compra',
			 'datos'=>$Compra
		];
		}
		
		
		echo view('header');
		echo view('Compras/editar',$data);
		echo view('footer');
	}
	public function actualizar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->Compras->update(
				$this->request->getPost('id'),
				['nombre'=>$this->request->getPost('nombre'),
				'nombre_corto'=>$this->request->getPost('nombre_corto')]
			);
		return redirect()->to(base_url().'/Compras');
		}else{
			return $this->editar($this->request->getPost('id'),$this->validator);
		}
	}
	public function eliminar($id){
		$this->Compras->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/Compras');
	}
	public function reingresar($id){
		$this->Compras->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/Compras/eliminados');
	}

	//--------------------------------------------------------------------

}
