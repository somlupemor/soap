<?php
class F4_c_tipodecomprobante{
public $id;
public $tipocomprobante;
public $descripcion;
public $valormaximo;
public $fechainivigencia;
public $fechafinvigencia;

public function getAttr(){
return  get_class_vars( __CLASS__ );
}
}


?>
