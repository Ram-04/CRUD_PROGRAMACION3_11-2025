<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Crud; //esto es para importar el modelo 'Crud.php' 
class  Nawebona extends Controller{
    //funcion para mostrar los datos de la base de datos en la vista produclist.php
    public function index(){
        //instanciar el modelo
        $pro= new Crud();
        //traer los datos de la base de datos ordenados por id ascendente
        $datos['nojoda']= $pro->orderBy('id','ASC')->findAll();
        //cargar las vistas de cabecera y pie
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/pie');
        //retornar la vista de la lista de productos con los datos
        return view('productos/produclist',$datos);
    }
    //funcion para crear un nuevo producto
    public function crear(){
        //cargar las vistas de cabecera y pie
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/pie');
        //retornar la vista de crear producto
        return view('productos/crear',$datos);
    }
    //funcion para guardar los datos del nuevo producto en la base de datos
    public function guardar(){
        $libro= new Crud();
        $nombre = $this->request->getVar('nombre');
    $marca  = $this->request->getVar('marca');
    $coste  = $this->request->getVar('coste');

    $imagen = $this->request->getFile('imagen');
    $nuevoNombre = null;
    // validacion para verificar si se ha subido una imagen, en caso de que si se subio la procesamos
    if ($imagen && $imagen->isValid() && ! $imagen->hasMoved()) {
        // esto va a mover a la carpeta public/uploads usando FCPATH para mas placer
        $nuevoNombre = $imagen->getRandomName();
        $imagen->move(FCPATH . 'uploads', $nuevoNombre);
    }
// preparar los datos para insertar en la base de datos 
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

            // insertar los datos en la base de datos y regresar a la lista de productos produclist.php
            $libro->insert($datos);
            return $this->response->redirect(site_url('/produclist'));      
        }
      
       
    //funcion para borrar un producto de la base de datos
    public function borrar($id=null){
        $libro= new Crud();
        $datosLibro= $libro->where('id',$id)->first();

        if ($datosLibro) {
        // esta es la validacion para borrar el archivo físico si existe
        if (! empty($datosLibro['imagen'])) {
            $ruta = FCPATH . 'uploads/' . $datosLibro['imagen'];
            if (is_file($ruta) && file_exists($ruta)) {
                @unlink($ruta);
            }
        }

        // esto es para borrar el registro de la base de datos
        $libro->delete($id);
    }
        $libro->where('id',$id)->delete($id);
        return $this->response->redirect(site_url('/produclist'));
        echo "ELIMINADO CORRECTAMENTE".$id;

        }
        //funcion para editar un producto
        public function editar($id=null){
            $libro= new Crud();
            //traer los datos del producto a editar
            $datos['libro']=$libro->where('id',$id)->first();
            //cargar las vistas de cabecera y pie
            $datos['cabecera']= view('template/cabecera');
            $datos['pie']= view('template/pie');
           
            //retornar la vista de editar con los datos del producto
            return view('productos/editar',$datos);
        }
        //funcion para actualizar los datos del producto en la base de datos
        public function actualizar(){
            $libro= new Crud();
            //obtener los datos del formulario
            $id= $this->request->getVar('id');
            $imagen = $this->request->getFile('imagen');
            // validacion para verificar si se ha subido una imagen, en caso de que si se subio la procesamos
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