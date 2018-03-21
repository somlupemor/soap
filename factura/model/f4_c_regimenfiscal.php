<?php
class F4_c_regimenfiscal{
  public $id;
  public $c_regimenfiscal;
  public $descripcion;
  public $fisica;
  public $moral;
  public $fechainiciovigencia;
  public $fechafinvigencia;
  
  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}
?>
