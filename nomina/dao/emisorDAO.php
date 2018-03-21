<?php
include_once("MySQL.php");
include_once("../model/Emisor.php");


class EmisorDAO {
    //put your code here
public $conexion;
public $parcela;

public function __construct(){
    if(!isset($this->conexion))
        $this->conexion=new MySQL();
}

function getEmisores(){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from emisor";
    $emisorcolumns=(new Emisor())->getAttr();
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

function getEmisor($rfc){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from emisor where rfc=\"$rfc\"";
    $emisorcolumns=(new Emisor())->getAttr();
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
