<?php
include_once("MySQL.php");
include_once("../model/f4_c_regimenfiscal.php");

class f4_c_regimenfiscalDAO{
  public $conexion;


  public function __construct(){
      if(!isset($this->conexion))
          $this->conexion=new MySQL();
  }


  public function getRegimenFiscal($regimenfiscal){
      //$Parcela=cast('Parcela',$parcela);
      $query="select * from f4_c_regimenfiscal where c_regimenfiscal=\"$regimenfiscal\"";      
      $emisorcolumns=(new F4_c_regimenfiscal())->getAttr();
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
//print_r((new f4_c_regimenfiscalDAO )->getRegimenFiscal());

?>
