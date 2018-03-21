<?php
class Emisor{
  public $id;
  public $registropatronal;
  public $rfc;
  public $razonsocial;
  public $direccion;
  public $numeroint;
  public $numeroext;
  public $colonia;
  public $localidad;
  public $cp;
  public $municipio;
  public $estado;
  public $pais;
  public $moral;
  public $regimenfiscal;
  public $moneda;
  public $correo;
  public $telefono;


  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}






?>
