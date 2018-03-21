<?php

class Empleado{
  public $id;
  public $noempleado;
  public $curp;
  public $rfc;
  public $nss;
  public $nombrecompleto;
  public $direccion;
  public $numero;
  public $colonia;
  public $localidad;
  public $cp;
  public $municipio;
  public $estado;
  public $pais;
  public $fechainicialrellab;
  public $antiguedad;
  public $tipocontrato;
  public $sindicalizado;
  public $tipojornada;
  public $tipoderegimen;
  public $departamento;
  public $puesto;
  public $salariodiariointegrado;
  public $salarioyaportaciones;
  public $tiponomina;
  public $periodicidadpago;
  public $riesgodelpuesto;
  public $cuentabancaria;
  public $banco;
  public $cuentaclabe;
  public $correo;
  public $usocfdi;


  public function getAttr(){
  return  get_class_vars( __CLASS__ );
  }
}
?>
