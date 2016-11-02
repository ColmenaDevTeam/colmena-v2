<?php
/**
 * @author: Elias Peraza @tesoner
 */
namespace Colmena\Http\Controllers;

use Illuminate\Http\Request;

use Colmena\Http\Requests;

class CdepartamentosController extends Controller
{
    public function __construct(){
       $this->middleware("auth");
    }
    public function getRegistrar(){
        return view("departamentos.registrar");
    }
    public function getVer(){
        return view("departamentos.ver");
    }
    public function getModificar(){
        return view("departamentos.modificar");
    }
}
