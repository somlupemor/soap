<?php
include_once("MySQL.php");
class MetaDataTable{
  //Field 	Type 	Null 	Key 	Default 	Extra
 public $conexion;
 public function __construct(){
   //
   if(!isset($this->conexion))
       $this->conexion=new MySQL();

 }

 function getAttTable($table)
 {
     $idparcela;
     $query= "SHOW COLUMNS FROM $table" ;
     $data=array();
     $resultado=$this->conexion->consulta($query);
       if ($resultado) {
        /* Obtener la información del campo para todas las columnas */
        $info_campo = $resultado->fetch_fields();
        $columns=array();
        foreach ($info_campo as $valor) {
            $columns[]= $valor->name;
          }
          while($row=  mysqli_fetch_array($resultado))
         {
           $datarow=array();
           foreach($columns as $valor){
              $datarow[$valor]=$row[$valor];

           }
         $data[]=$datarow;
        }

     }

     return $data;
  }
}

print_r((new MetaDataTable())->getAttTable("emisor"));

?>
