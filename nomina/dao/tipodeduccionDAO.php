<?php
include_once("MySQL.php");
include_once("../model/topodeduccion.php");


class TipodeduccionDAO {
    //put your code here
public $conexion;
public $parcela;

public function __construct(){
    if(!isset($this->conexion))
        $this->conexion=new MySQL();
}

function getDeducciones(){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from tipodeduccion";
    $emisorcolumns=(new Tipodeduccion())->getAttr();
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

function getDeduccion($rfc){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from tipodeduccion where rfc=\"$rfc\"";
    $emisorcolumns=(new Tipodeduccion())->getAttr();
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
