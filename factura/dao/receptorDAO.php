<?php
include_once("MySQL.php");
include_once("../model/Receptor.php");


class ReceptorDAO {
    //put your code here
public $conexion;
public $parcela;

public function __construct(){
    if(!isset($this->conexion))
        $this->conexion=new MySQL();
}

function getReceptores(){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from receptor";
    $emisorcolumns=(new Receptor())->getAttr();
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

function getReceptor($rfc){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from receptor where rfc=\"$rfc\"";
    $emisorcolumns=(new Receptor())->getAttr();
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
 //echo json_encode((new ReceptorDAO())->getReceptores());
?>
