<?php

class F4_c_moneda{
  public $id;
  public $moneda;
  public $descripcion;
  public $decimales;
  public $porcentajevariacion;

  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}

?>
