<?php
class Tipodeduccion{
  public $id;
  public $tipodeduccion;
  public $descripcion;
  public $fechainiciovigencia;
  public $fechaterminovigencia;



  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}






?>
