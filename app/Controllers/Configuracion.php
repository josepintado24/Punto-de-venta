<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Configuracion extends BaseController{

	protected $configuracion;
	protected $reglas;

	public function __construct(){
		$this->configuracion=new ConfiguracionModel;
		helper(['form']);

		$this->reglas=[
			'tienda_nombre'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'tienda_rfc'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'tienda_telefono'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'tienda_email'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'tienda_direccion'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			],
			'ticket_leyenda'=>[
				'rules'=>'required',
				'errors'=>[
					'required'=>'El campo {field} es obligatorio.'
				]
			]


		];
	}
	public function index(){
		$nombre=$this->configuracion->where('nombre', 'tienda_nombre')->first();
		$tienda_rfc=$this->configuracion->where('nombre', 'tienda_rfc')->first();
		$tienda_telefono=$this->configuracion->where('nombre', 'tienda_telefono')->first();
		$tienda_email=$this->configuracion->where('nombre', 'tienda_email')->first();
		$tienda_direccion=$this->configuracion->where('nombre', 'tienda_direccion')->first();
		$ticket_leyenda=$this->configuracion->where('nombre', 'ticket_leyenda')->first();
		$ticket_wp=$this->configuracion->where('nombre', 'ticket_wp')->first();
		$data=[
			'titulo'=>'Configuracion',
			'nombre'=>$nombre,
			'tienda_rfc'=>$tienda_rfc,
			'tienda_telefono'=>$tienda_telefono,
			'tienda_email'=>$tienda_email,
			'tienda_direccion'=>$tienda_direccion,
			'ticket_leyenda'=>$ticket_leyenda,
			'ticket_wp'=>$ticket_wp
		];
		echo view('header');
		echo view('configuracion/configuracion',$data);
		echo view('footer');
	}

	public function nuevo(){
		$data=[
			'titulo'=>'Agregar configuracion'
		];
		echo view('header');
		echo view('configuracion/nuevo',$data);
		echo view('footer');
	}
	public function insertar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->configuracion->save([
				'nombre'=>$this->request->getPost('nombre'),
				'nombre_corto'=>$this->request->getPost('nombre_corto')
				]);
			return redirect()->to(base_url().'/configuracion');	
		}
		else{
			$data=[
				'titulo'=>'Agregar configuracion',
				'validation'=> $this->validator
			];
			echo view('header');
			echo view('configuracion/nuevo',$data);
			echo view('footer');
		}
	}
 
	public function editar($id, $valid=null){
		$nombre=$this->configuracion->where('nombre', 'tienda_nombre')->first();
		$tienda_rfc=$this->configuracion->where('nombre', 'tienda_rfc')->first();
		$tienda_telefono=$this->configuracion->where('nombre', 'tienda_telefono')->first();
		$tienda_email=$this->configuracion->where('nombre', 'tienda_email')->first();
		$tienda_direccion=$this->configuracion->where('nombre', 'tienda_direccion')->first();
		$ticket_leyenda=$this->configuracion->where('nombre', 'ticket_leyenda')->first();
		
		if ($valid != null){
			$data=[
				'titulo'=>'Configuracion',
				'nombre'=>$nombre,
				'tienda_rfc'=>$tienda_rfc,
				'tienda_telefono'=>$tienda_telefono,
				'tienda_email'=>$tienda_email,
				'tienda_direccion'=>$tienda_direccion,
				'ticket_leyenda'=>$ticket_leyenda,
				'validation'=>$valid
			];
		}else{
			$data=[
				'titulo'=>'Configuracion',
				'nombre'=>$nombre,
				'tienda_rfc'=>$tienda_rfc,
				'tienda_telefono'=>$tienda_telefono,
				'tienda_email'=>$tienda_email,
				'tienda_direccion'=>$tienda_direccion,
				'ticket_leyenda'=>$ticket_leyenda
			];
		}
		echo view('header');
		echo view('configuracion/configuracion',$data);
		echo view('footer');
	}
	public function actualizar(){
		if ($this->request->getMethod()=="post" && $this->validate($this->reglas)){
			$this->configuracion->whereIn('nombre',	['tienda_nombre'])
			->set(['valor'=>$this->request->getPost('tienda_nombre')])
			->update();

			$this->configuracion->whereIn('nombre',	['tienda_rfc'])
			->set(['valor'=>$this->request->getPost('tienda_rfc')])
			->update();

			$this->configuracion->whereIn('nombre',	['tienda_telefono'])
			->set(['valor'=>$this->request->getPost('tienda_telefono')])
			->update();

			$this->configuracion->whereIn('nombre',	['tienda_email'])
			->set(['valor'=>$this->request->getPost('tienda_email')])
			->update();

			$this->configuracion->whereIn('nombre',	['tienda_direccion'])
			->set(['valor'=>$this->request->getPost('tienda_direccion')])
			->update();

			$this->configuracion->whereIn('nombre',	['ticket_leyenda'])
			->set(['valor'=>$this->request->getPost('ticket_leyenda')])
			->update();

			$this->configuracion->whereIn('nombre',	['ticket_wp'])
			->set(['valor'=>$this->request->getPost('ticket_wp')])
			->update();

			
			// $img->move(WRITEPATH.'/uploads');
			$validacion=$this->validate([
				'tienda_logo' =>[
					'uploaded[tienda_logo]',
					'mime_in[tienda_logo,image/png]',
					'max_size[tienda_logo, 4096]'
				]
			]);
			if($validacion){
				$ruta_logo='images/logopdf.png';
				if(file_exists($ruta_logo)){
					unlink($ruta_logo);
				}
				$img=$this->request-> getFile('tienda_logo');
				$img->move('./images', 'logopdf.png' );
			}else{
				return redirect()->to(base_url().'/configuracion');
			}
			return redirect()->to(base_url().'/configuracion');
		}else{
			return $this->editar($this->request->getPost('id'),$this->validator);
		}
	}
	public function eliminar($id){
		$this->configuracion->update(
			$id,
			['activo'=>0]
		);
		return redirect()->to(base_url().'/configuracion');
	}
	public function reingresar($id){
		$this->configuracion->update(
			$id,
			['activo'=>1]
		);
		return redirect()->to(base_url().'/configuracion/eliminados');
	}

	//--------------------------------------------------------------------

}
