<?php

$client = new SoapClient("https://www.fel.mx/WS-TFD/WS-TFD.asmx?WSDL");
//print_r($client->TimbrarCFDPrueba());
$dataconect=explode(",",str_replace(array('\n','\t'),'',file_get_contents("../satfile/certificadopm.txt")));
foreach($dataconect as $key=>$data){
        if($key==0){
          $password=explode(":",$data)[1];
        }
        if($key==1){

          $nocertificado=explode(":",$data)[1];
        }

}
//echo $password." ".$nocertificado;
echo "pass".$password;
$xmlfile=file_get_contents("../satfile/rv_timbrado/XML_Timbrado_Ejemplo.xml");
print($xmlfile);
$xdoc = new DomDocument();
$xdoc->loadXML($xmlfile) or die("XML invalido");
print_r($client->TimbrarCFDPrueba($nocertificado,$password,$xmlfile));

?>
