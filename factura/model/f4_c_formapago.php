<?php
class F4_c_formapago{
public $id;
public $formapago;
public $descripcion;
public $bancarizado;
public $numerooperacion;
public $rfcemisorcuentaordenante;
public $cuentaordenante;
public $patroncuentaordenante;
public $rfcemisorcuentabeneficiario;
public $cuentabenenficiario;
public $patroncuentabeneficiaria;
public $tipocadenapago;
public $nombrebancoemisorcuentaordenante;



public function getAttr(){
  return  get_class_vars( __CLASS__ );
}
}
?>
