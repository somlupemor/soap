<?php
include_once("MySQL.php");
include_once("../model/f4_c_claveprodserv.php");


class F4_c_claveprodservDAO {
    //put your code here
public $conexion;
public $parcela;

public function __construct(){
    if(!isset($this->conexion))
        $this->conexion=new MySQL();
}

function getclavesprodserv(){
    //$Parcela=cast('Parcela',$parcela);
    $query="select * from f4_c_claveprodserv";
    $emisorcolumns=(new F4_c_claveprodserv())->getAttr();
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


}




?>
