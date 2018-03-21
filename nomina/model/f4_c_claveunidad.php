<?php
class F4_c_claveunidad{
  public $id;
  public $claveunidad;
  public $nombre;
  public $descripcion;
  public $fechainivigencia;
  public $fechafinvigencia;
  public $simbolo;


  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}






?>
