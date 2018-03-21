<?php
class Emisor{
  public $id;
  public $rfc;
  public $razonsocial;
  public $direccion;
  public $numero;
  public $colonia;
  public $localidad;
  public $cp;
  public $municipio;
  public $estado;
  public $pais;
  public $moral;
  public $regimenfiscal;
  public $moneda;

  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}






?>
