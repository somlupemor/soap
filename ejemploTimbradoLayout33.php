<?php
date_default_timezone_set('America/Mexico_City');
include("FacturacionModerna/FacturacionModerna.php");

/**
 * Descripción: Ejemplo del uso de la clase FacturacionModerna, generando un
 * archivo de texto simple con los layouts soportados para ser timbrados.
 * http://developers.facturacionmoderna.com/#layout 
 *
 * 
 * Facturación Moderna :  (http://www.facturacionmoderna.com)
 * @author Ivan Aquino <ivan.aquino@facturacionmoderna.com>
 * @package FacturacionModerna
 * @version 1.0
 */

pruebaTimbrado();

/**
 * Prueba de timbrado con la conexion a Facturacion Moderna
 * @return void
 */
function pruebaTimbrado(){

  /**
  * Niveles de debug:
  * 0 - No almacenar
  * 1 - Almacenar mensajes SOAP en archivo log.
  */
  
  $debug = 1;
  
  // RFC utilizado para el ambiente de pruebas
  $rfc_emisor = "TCM970625MB1";
  
  //Datos de acceso al ambiente de pruebas
  $url_timbrado = "https://t1demo.facturacionmoderna.com/timbrado/wsdl";
  $user_id = "UsuarioPruebasWS";
  $user_password = "b9ec2afa3361a59af4b4d102d3f704eabdf097d4";

  // Generar y sellar un XML con los CSD de pruebas
  $cfdi = generarLayout($rfc_emisor);

  $parametros = array('emisorRFC' => $rfc_emisor,'UserID' => $user_id,'UserPass' => $user_password);

  $opciones = array();
  
  /**
  * Establecer el valor a true, si desea que el Web services genere el CBB en
  * formato PNG correspondiente.
  * Nota: Utilizar está opción deshabilita 'generarPDF'
  */     
  $opciones['generarCBB'] = false;
  
  /**
  * Establecer el valor a true, si desea que el Web services genere la
  * representación impresa del XML en formato PDF.
  * Nota: Utilizar está opción deshabilita 'generarCBB'
  */
  $opciones['generarPDF'] = false;
  
  /**
  * Establecer el valor a true, si desea que el servicio genere un archivo de
  * texto simple con los datos del Nodo: TimbreFiscalDigital
  */
  $opciones['generarTXT'] = false;
  

  $cliente = new FacturacionModerna($url_timbrado, $parametros, $debug);

  if($cliente->timbrar($cfdi, $opciones)){

    //Almacenanos en la raíz del proyecto los archivos generados.
    $comprobante = 'comprobantes/'.$cliente->UUID;
    
    if($cliente->xml){
      echo "XML almacenado correctamente en $comprobante.xml\n";        
      file_put_contents($comprobante.".xml", $cliente->xml);
    }
    if(isset($cliente->pdf)){
      echo "PDF almacenado correctamente en $comprobante.pdf\n";
      file_put_contents($comprobante.".pdf", $cliente->pdf);
    }
    if(isset($cliente->png)){
      echo "CBB en formato PNG almacenado correctamente en $comprobante.png\n";
      file_put_contents($comprobante.".png", $cliente->png);
    }
    
    echo "Timbrado exitoso\n";
    
  }else{
    echo "[".$cliente->ultimoCodigoError."] - ".$cliente->ultimoError."\n";
  }    
}

/**
 * Generar el layout para el timbrado
 * @param  string $rfc_emisor RFC del emisor
 * @return string             Layout para timbrar
 */
function generarLayout($rfc_emisor){

  $fecha_actual = substr( date('c'), 0, 19);

  /*
    Puedes encontrar más ejemplos y documentación sobre estos archivos aquí. (Factura, Nota de Crédito, Recibo de Nómina y más...)
    Link: https://github.com/facturacionmoderna/Comprobantes
    Nota: Si deseas información adicional contactanos en www.facturacionmoderna.com
 */

  $cfdi = <<<LAYOUT
[ComprobanteFiscalDigital]

; Definición del layout INI para Comprobantes Fiscales por Internet Versión 3.3
; Nota: Los comentarios empiezan con ; 
; Elaboró: Facturación Moderna
; Contacto: wsoporte@facturacionmoderna.com

Version=3.3
Serie=A
Folio=02
Fecha=$fecha_actual
FormaPago=03
NoCertificado=20001000000300022762
CondicionesDePago=CONTADO
SubTotal=1850
Descuento=175.00
Moneda=MXN
Total=1943.00
TipoDeComprobante=I
MetodoPago=PUE
LugarExpedicion=68050

[DatosAdicionales]
tipoDocumento=FACTURA
observaciones=Observaciones al documento versión 3.3
platillaPDF=clasic

[Emisor]
Rfc=$rfc_emisor
Nombre=FACTURACION MODERNA SA DE CV
RegimenFiscal=601

[Receptor]
Rfc=XAXX010101000
Nombre=PUBLICO EN GENERAL
UsoCFDI=G01


[Concepto#1]
ClaveProdServ=01010101
NoIdentificacion=AULOG001
Cantidad=5
ClaveUnidad=H87
Unidad=Pieza
Descripcion=Aurriculares USB Logitech
ValorUnitario=350.00
Importe=1750.00
Descuento=175.00

Impuestos.Traslados.Base=[1575.00]
Impuestos.Traslados.Impuesto=[002]
Impuestos.Traslados.TipoFactor=[Tasa]
Impuestos.Traslados.TasaOCuota=[0.160000]
Impuestos.Traslados.Importe=[252.00]

[Concepto#2]
ClaveProdServ=43201800
NoIdentificacion=USB
Cantidad=1
ClaveUnidad=H87
Unidad=Pieza
Descripcion=Memoria USB 32gb marca Kingston
ValorUnitario=100.00
Importe=100.00

Impuestos.Traslados.Base=[100.00]
Impuestos.Traslados.Impuesto=[002]
Impuestos.Traslados.TipoFactor=[Tasa]
Impuestos.Traslados.TasaOCuota=[0.160000]
Impuestos.Traslados.Importe=[16.00]

[Traslados]
TotalImpuestosTrasladados=268.00
Impuesto=[002]
TipoFactor=[Tasa]
TasaOCuota=[0.160000]
Importe=[268.00]

LAYOUT;
  return $cfdi;
}

?>
