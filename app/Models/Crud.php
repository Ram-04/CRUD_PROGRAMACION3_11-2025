<?php 
namespace App\Models;

use CodeIgniter\Model;
//modelo para la tabla 'registro' de la base de datos
class Crud extends Model{
    //definir la tabla y la clave primaria
    protected $table    = 'registro';
    protected $primaryKey = 'id';
    //campos permitidos para insertar o actualizar la base de datos
    protected $allowedFields = ['nombre', 'marca', 'coste', 'imagen'];
}