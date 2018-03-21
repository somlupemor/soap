<?php
include_once("MySQL.php");
include_once("../model/tipopercepcion.php");


class TipopercepcionDAO {
    //put your code here
public $conexion;
public $parcela;

public function __construct(){
    if(!isset($this->conexion))
        $this->conexion=new MySQL();
}

function gettipospercepcion(){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from tipopercepcion";
    $emisorcolumns=(new Tipopercepcion())->getAttr();
    $resultado=$this->conexion->consulta($query);
    $data=array();
    if($resultado){
      while ($row = mysqli_fetch_array($resultado))
			 {
         $datarow=array();
         foreach($emisorcolumns as $key=> $val){
           $datarow[$key]=$row[$key];
         }
         $data[]=$datarow;
			 }
        return $data;
    return $data;
 }
}

function gettipodeduccion($tipopercepcion){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from topopercepcion where tipopercepcion=\"$tipopercepcion\"";
    $emisorcolumns=(new Topopercepcion())->getAttr();
    $resultado=$this->conexion->consulta($query);
    $data;
    if($resultado){
      while ($row = mysqli_fetch_array($resultado))
			 {
         $datarow=array();
         foreach($emisorcolumns as $key=> $val){
           $datarow[$key]=$row[$key];
         }
         $data=$datarow;
			 }
    return $data;
  }
 }
}




?>
