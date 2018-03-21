<?php
$endpoint = "http://nombre_host/ruta_del_servicio";
$wsdlFile= "nombre_archivo.wsdl";

 //Creación del cliente SOAP
$clienteSOAP = new SoapClient($wsdlFile,array(
‘location’=>$endpoint,
‘trace’=>true,
‘exceptions’=>false));
 //Incluye los parámetros que necesites en tu función
$parameters= array(
“parametro1″=>”valor1”,
“parametro2″=>”valor2”);
  //Invocamos a una función del cliente, devolverá el resultado en formato array.
$valor = $client->nombre_funcion($parameters);

  //Puedes usar un printr($valor) para ver el contenido del array multidimensional
  //Aquí tienes un ejemplo de cómo acceder a un valor concreto dentro del array
$localizador=$value->nombre_de_la_clave_del_array;
  //A continuación podrás continuar con tu código PHP o invocar más funciones SOAP
header("location:http://http://nombre_host/ruta_del_servicio?variable1=".$valor1."&variable2=".$valor2);
?>
