<?php
include_once("MySQL.php");
include_once("../model/f4_c_moneda.php");

class F4_c_monedaDAO{
  public $conexion;
  public function __construct(){
      if(!isset($this->conexion))
          $this->conexion=new MySQL();
  }

  public function getmonedas(){
      //$Parcela=cast('Parcela',$parcela);
      $query="select * from f4_c_moneda";
      $emisorcolumns=(new F4_c_moneda())->getAttr();
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

//echo (json_encode((new F4_c_monedaDAO())->getmonedas()));

?>
