<?php
include_once("MySQL.php");
include_once("../model/Empleado.php");


class EmpleadoDAO {
    //put your code here
public $conexion;
public $parcela;

public function __construct(){
    if(!isset($this->conexion))
        $this->conexion=new MySQL();
}

function getEmpleados(){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from empleado";
    $emisorcolumns=(new Empleado())->getAttr();
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

function getEmpleado($noempleado){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from empleado where noempleado=\"$noempleado\"";
    $emisorcolumns=(new Empleado())->getAttr();
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
