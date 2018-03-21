<?php
class Tipopercepcion{
  public $id;
  public $tipopercepcion;
  public $descripcion;
  public $fechainiciovigencia;
  public $fechafinvigencia;


  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}






?>
