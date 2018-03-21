<?php
include_once("MySQL.php");
include_once("../model/f4_c_metodopago.php");

class F4_c_metodopagoDAO{
  public $conexion;
  public function __construct(){
      if(!isset($this->conexion))
          $this->conexion=new MySQL();
  }

  public function getmetodopagos(){
      //$Parcela=cast('Parcela',$parcela);
      $query="select * from f4_c_metodopago";
      $emisorcolumns=(new F4_c_metodopago())->getAttr();
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
