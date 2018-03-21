<?php
include_once("utils.php");
include_once("../dao/emisorDAO.php");
include_once("../dao/f4_c_regimenfiscalDAO.php");
include_once("../dao/f4_c_tipodecomprobanteDAO.php");
include_once("../dao/receptorDAO.php");
include_once("../dao/f4_c_usocfdiDAO.php");
include_once("../dao/f4_c_monedaDAO.php");
include_once("../dao/f4_c_formapagoDAO.php");
include_once("../dao/f4_c_metodopagoDAO.php");
include_once("../dao/f4_c_claveprodservDAO.php");
include_once("../dao/f4_c_claveunidadDAO.php");

class Factura33l{
public function gettipocomprobante(){
  $f4_c_tipodecomprobanteDAO=new F4_c_tipodecomprobanteDAO();
  return $f4_c_tipodecomprobanteDAO->getTipoComprobante();
}
public function getregimenfiscal($clave){
$regimenfiscalDAO=new f4_c_regimenfiscalDAO();
return $regimenfiscalDAO->getRegimenFiscal($clave);
}

public function getregimenfiscalEmisor(){
$regimenfiscalDAO=new f4_c_regimenfiscalDAO();
return $regimenfiscalDAO->getRegimenFiscal();
}

public function getEmisor($rfc){
  $emisorDAO=new EmisorDAO();
  $emisor=$emisorDAO->getEmisor($rfc);
  $emisor["regimenfiscaldesc"]=$this->getregimenfiscal($emisor["regimenfiscal"]);
  return $emisor;
 }

public function getReceptoresRegistrados(){
  $receptorDAO=new ReceptorDAO();
  return $receptorDAO->getReceptores();
}
public function getusocfdi(){
$f4_c_usocfdiDAO=new F4_c_usocfdiDAO();
return $f4_c_usocfdiDAO->getusocfdi();
}

public function getmoendas(){
$f4_c_monedaDAO=new F4_c_monedaDAO();
return $f4_c_monedaDAO->getmonedas();
}
public function getformaspago(){
$f4_c_formapagoDAO=new F4_c_formapagoDAO();
return $f4_c_formapagoDAO->getformaspago();
}

public function getmetodopago(){
$f4_c_metodopagoDAO=new F4_c_metodopagoDAO();
return $f4_c_metodopagoDAO->getmetodopagos();
}

public function getcalveprodserv(){
$f4_c_claveprodservDAO=new F4_c_claveprodservDAO();
return $f4_c_claveprodservDAO->getclavesprodserv();
}


public function getclavesunidad(){
$f4_c_claveunidadDAO=new F4_c_claveunidadDAO();
return $f4_c_claveunidadDAO->getcalvesunidad();
}



}

if($request=getParameter("request"))
switch($request){
  case "emisor";
    echo json_encode((new Factura33l())->getEmisor("FPM960610MN3"));
  break;
  case "tipocfdi";
    echo json_encode((new Factura33l())->gettipocomprobante());
  break;
  case "receptoresreg";
    echo json_encode((new Factura33l())->getReceptoresRegistrados());
  break;
  case "usocfdi";
    echo json_encode((new Factura33l())->getusocfdi());
  break;
  case "getmonedas";
    echo json_encode((new Factura33l())->getmoendas());
  break;
  case "getformaspago";
    echo json_encode((new Factura33l())->getformaspago());
  break;
  case "getmetodospago";
    echo json_encode((new Factura33l())->getmetodopago());
  break;
  case "getclaveprodserv";
    echo json_encode((new Factura33l())->getcalveprodserv());
  break;
  case "getclavesunidad";
    echo json_encode((new Factura33l())->getclavesunidad());
  break;

}




?>
