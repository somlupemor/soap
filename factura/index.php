<!DOCTYPE html>
<html ng-app="factura33">
<script type="text/javascript" src="js/angular.min169.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/ctrl.js"></script>
<body>
Datos del emisor
<div ng-controller="ctrlEmisor">
<label  class="" for="Emisor_Rfc" ng-model="Emisor_rfc" required>RFC</label>
<input ng-model="Emisor.rfc" class="" id="Emisor_Rfc" name="Emisor_Rfc" type="text"    readonly="readonly" placeholder="RFC"/>
<label class="" for="Emisor_razon">Nombre o razón social:</label>
<input ng-model="Emisor.razonsocial" class="" id="Emisor_razon" name="Emisor_razon" type="text" value=""  readonly="readonly" placeholder="Razon Social"/>
<label class="control-label" for="Emisor_regimenfiscal">R&#233;gimen fiscal</label>
<select ng-model="emisor_regimenfiscal_model" id="Emisor_regimenfiscal" name="Emisor_regimenfiscal" class="form-control">
  <option ng-repeat="x in emisor_regimenfiscalObject" value="{{x.c_regimenfiscal}}">{{x.c_regimenfiscal+" | "+x.descripcion}}</option>
</select>
<label class="control-label" for="Emisor_tipodefactura">Tipo de factura</label>
<select ng-model="emisor_tipofactura_model" id="Emisor_tipodefactura" name="Emisor_tipodefactura" class="form-control" value="">
  <option ng-repeat="x in tipocfdi" value="{{x.c_tipocomprobante}}">{{x.c_tipocomprobante+" | "+x.descripcion}}</option>
</select>

<div ng-controller="ctrlReceptor">
  Receptores registrados:<br>
    <select ng-model="select_receptores_model" id="Receptores_select" name="Receptores_select" class="form-control">
      <option ng-repeat="x in receptores" value="{{x.rfc}}">{{x.rfc+" | "+x.razonsocial}}</option>
  </select>
  <select ng-model="select_usofactura_model" id="UsoFactura_select" name="UsoFactura" class="form-control">
    <option ng-repeat="x in usocfdi" value="{{x.rfc}}">{{x.usocfdi+" | "+x.descripcion}}</option>
</select>
</div>

<div id="comprobante" ng-controller="ctrlEmisor">
  <label  class="" for="comprobante_fecha" required>Fecha y hora de expedicion</label>
  <input type="datetime-local" id="comprobante_fecha" name="comprobante_fecha" ng-model="fechaemision"
      placeholder="yyyy-MM-ddTHH:mm:ss" min="2018-01-01T00:00:00" max="2018-12-31T23:59:59" required />
  <label  class="" for="comprobante_cp" required>Codigo postal</label>
  <input type="" id="comprobante_cp" name="comprobante_cp" ng-model="Emisor.cp"  placeholder="00000"  required />
  <label class="control-label" for="select_moneda">Moneda</label>
  <select ng-model="select_moneda" id="select_moneda" name="select_moneda" class="form-control">
    <option ng-repeat="x in monedas" value="{{x.moneda}}">{{x.moneda+" | "+x.descripcion}}</option>
</select>

<label class="control-label" for="select_formapago">forma de pagso</label>
<select ng-model="select_formapago" id="select_formapago" name="select_formapago" class="form-control">
  <option ng-repeat="x in formaspago" value="{{x.formapago}}">{{x.formapago+" | "+x.descripcion}}</option>
</select>
<label class="control-label" for="select_metodopago">Metodo pago</label>
<select ng-model="select_metodopago" id="select_metodopago" name="select_metodopago" class="form-control">
  <option ng-repeat="x in metodospago" value="{{x.metodopago}}">{{x.metodopago+" | "+x.descripcion}}</option>
</select>
  <!--<input ng-model="Comprobante.fecha" class="" id="f_comprobante_fecha" name="f_comprobante_fecha" type="text" placeholder="Fecha"/>-->
</div>

<label  class="" for="comprobante_tipodecambio" required>Tipo de cambio</label>
<input type="text" id="comprobante_tipodecambio" name="comprobante_tipodecambio" ng-model="tipodecambio"
    placeholder="tipo de cambio" />

  <label  class="" for="comprobante_tipodecambio" required>Serie</label>
  <input type="text" id="comprobante_serie" name="comprobante_serie" ng-model="seriecomprobante" placeholder="Serie de comprobante" />
  <label  class="" for="comprobante_folio" required>Folio</label>
  <input type="text" id="comprobante_folio" name="comprobante_folio" ng-model="foliocomprobante" placeholder="Folio" />
  <label  class="" for="comprobante_confirmacion" required>Confirmacion</label>
  <input type="text" id="comprobante_confirmacion" name="comprobante_confirmacion" ng-model="confirmacioncomprobante" placeholder="confirmacion" />
  <label  class="" for="comprobante_condicionespago" required>Condiciones de pago</label>
  <input type="text" id="comprobante_condicionespago" name="comprobante_condicionespago" ng-model="condicionespago" placeholder="condiciones pago" />

  </div>
  <div id="conceptos" ng-controller="ControllerConcepto" >
  Conceptos<br>
  Clave de producto o servicio
  <input type="text" keyboard-poster post-function="searchclaveprodserv" name="clave" placeholder="Clave servicio"   list="_clavesprodserv" style='margin-bottom: 100px' />
            <datalist id="_clavesprodserv">
             <select style="display: none;" id="_select" name="_select" ng-model='selectclaveproserv' ng-options='descripcion  as prodserv.descripcion for prodserv in clavesprodserv track by prodserv.descripcion ' ></select>
           </datalist>
Clave unidad
<input type="text" keyboard-poster post-function="searchclaveunidad" name="claveunidad" placeholder="Clave Unidad"  ng-model="selectclaveunidad" list="_clavesunidad" ng-change="setNombreUnidad(selectclaveunidad)"  style='margin-bottom: 100px'/>
 <datalist id="_clavesunidad">
 <select style="display: none;" id="_selectclavesunidad" name="_selectclavesunidad" ng-model='selectclaveunidad' ng-options='nombre  as claveunidad.nombre for claveunidad in clavesunidad track by claveunidad.claveunidad' >
   <option value="?" ></option>
 </select>
</datalist>
Cantidad
<input type="text" id="comprobante_concepto_cantidad_" name="comprobante_concepto_cantidad_" placeholder="1" ng-model="conceptocantidad" ng-change="calcconceptoimporte()"/>
Unidad
<input type="text" id="comprobante_concepto_unidad_" name="comprobante_concepto_unidad_"  ng-model='servicio.nombre' /><br>
Numero de identificacion
<input type="text" id="comprobante_concepto_num_identificacion_" name="comprobante_concepto_num_identificacion_" ng-model="conceptonoidentificacion" /><br>
Descripcion
<input type="text" id="comprobante_concepto_descripcion_" name="comprobante_concepto_descripcion_" ng-model="conceptodescripcion"/><br>
Valor Unitario
<input type="text" id="comprobante_concepto_valor_unitario_" name="comprobante_concepto_valor_unitario_" ng-model="conceptovalorunitario" ng-change="calcconceptoimporte()"/>
Importe
<input type="text" id="comprobante_concepto_importe" name="comprobante_concepto_importe" ng-model="conceptoimporte"/>
Descuento
<input type="text" id="comprobante_concepto_descuento" name="comprobante_concepto_descuento" placeholder="0.00" ng-model="conceptodescuento"/>
<table>
 <tr ng-repeat="concepto in conceptos">
   <td>{{ x.Name }}</td>
   <td>{{ x.Country | uppercase }}</td>
 </tr>
</table>
</div>

<!---<div ng-controller="ControllerClaveProdServ">

    <input ng-model="claveprodserv" ng-change="search()" placeholder="claveprodser" />
    <ul>
        <li ng-repeat="_claveprodserv in clavesprodserv">
            <a ng-click="cambiaclaveprodserv(_claveprodserv.descripcion)">
                {{ _claveprodserv.descripcion }}
            </a>
        </li>
    </ul>
</div>-->



</body>
</html>
