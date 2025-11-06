<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Crud;
class  Nawebona extends Controller{
    public function index(){
        $pro= new Crud();
        $datos['nojoda']= $pro->orderBy('id','ASC')->findAll();

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/pie');

        return view('productos/produclist',$datos);
    }
    public function crear(){
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/pie');

        return view('productos/crear',$datos);
    }
    
    public function guardar(){
        $libro= new Crud();
        $nombre = $this->request->getVar('nombre');
    $marca  = $this->request->getVar('marca');
    $coste  = $this->request->getVar('coste');

    $imagen = $this->request->getFile('imagen');
    $nuevoNombre = null;

    if ($imagen && $imagen->isValid() && ! $imagen->hasMoved()) {
        // esto va a mover a la carpeta public/uploads usando FCPATH para mas placer
        $nuevoNombre = $imagen->getRandomName();
        $imagen->move(FCPATH . 'uploads', $nuevoNombre);
    }

    $datos = [
        'nombre' => $nombre,
        'marca'  => $marca,
        'coste'  => $coste,
        'imagen' => $nuevoNombre
    ];
//NO TOCAR, ESTA PORQUERIA NO FUNCIONA Y NO SE PORQUE
       /* $nombre= $this->request->getVar('nombre');
        $marca= $this->request->getVar('marca');
        $coste= $this->request->getVar('coste');  

        
        if($imagen=$this->request->getFile('imagen')){
            $nuevoNombre= $imagen->getRandomName();
            $imagen->move('../public/uploads/',$nuevoNombre);

            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'marca'=>$this->request->getVar('marca'),   
                'coste'=>$this->request->getVar('coste'), 
                'imagen'=>$nuevoNombre
            ];*/ 
            $libro->insert($datos);
            return $this->response->redirect(site_url('/produclist'));      
        }
      
       
    
    public function borrar($id=null){
        $libro= new Crud();
        $datosLibro= $libro->where('id',$id)->first();

       /*$ruta=('../public/uploads/'.$datosLibro['imagen']);
        unlink($ruta);*/

        $libro->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/produclist'));
        echo "ELIMINADO CORRECTAMENTE".$id;

        }
        public function editar($id=null){
            $libro= new Crud();
            $datos['libro']=$libro->where('id',$id)->first();

            $datos['cabecera']= view('template/cabecera');
            $datos['pie']= view('template/pie');
           

            return view('productos/editar',$datos);
        }
        public function actualizar(){
            $libro= new Crud();
            $id= $this->request->getVar('id');
            $imagen = $this->request->getFile('imagen');
            if ($imagen && $imagen->isValid() && ! $imagen->hasMoved()) {
                // esto va a mover a la carpeta public/uploads usando FCPATH para mas placer
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move(FCPATH . 'uploads', $nuevoNombre);
           $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'marca'=>$this->request->getVar('marca'),   
                'coste'=>$this->request->getVar('coste'),  
                'imagen'=>$nuevoNombre  
            ];
            $libro->update($id,$datos);
            /*$validacion = $this->validate([
                'imagen' => 'uploaded[imagen]|max_size[imagen,1024]|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]'
            ]);*/
           
        }
        return $this->response->redirect(site_url('/produclist'));              
    }
}