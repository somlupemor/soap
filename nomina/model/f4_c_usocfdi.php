<?php

class F4_c_usocfdi{
  public $id;
  public $usocfdi;
  public $descripcion;
  public $fisica;
  public $moral;
  public $fechainiciovigencia;
  public $fechafinvigencia;

  public function __construct(){

  }

  public function getAttr(){
    return  get_class_vars( __CLASS__ );
  }
 }
?>
