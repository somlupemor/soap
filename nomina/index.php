<!DOCTYPE html>
<html ng-app="factura33">
<link href="bootstrap-4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript" src="js/angular.min169.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/ctrl.js"></script>
<body>
  <div class="container" style="max-width:80%;padding:40px 20px;background:#ebeff2">
Datos del emisor
<div ng-controller="ctrlEmisor">
  <div class="form-group row">
    <label  class="" for="Emisor_Rfc" ng-model="Emisor_rfc" required>RFC</label>
  <div class="col-xs-9">
      <input ng-model="Emisor.rfc" class="" id="Emisor_Rfc" name="Emisor_Rfc" type="text"    readonly="readonly" placeholder="RFC"/>
  </div>
  </div>

<div class="form-group row">
  <label class="" for="Emisor_razon">Nombre o razón social:</label>
<div class="col-xs-9">
  <input ng-model="Emisor.razonsocial" class="" id="Emisor_razon" name="Emisor_razon" type="text" value=""  readonly="readonly" placeholder="Razon Social"/>
</div>
</div>


<div class="form-group row">
  <label class="control-label" for="Emisor_regimenfiscal">R&#233;gimen fiscal</label>
<div class="col-xs-9">
  <input ng-model="Emisor.regimenfiscal" id="Emisor_regimenfiscal" name="Emisor_regimenfiscal" class="form-control">
</div>
</div>

<div class="form-group row">
  <label class="control-label" for="Emisor_tipodefactura">Tipo de factura</label>
<div class="col-xs-9">
  <input ng-model="tipocomprobante"  id="Emisor_tipodefactura" name="Emisor_tipodefactura">
</div>
</div>






<div ng-controller="ctrlEmpleado">
<form class="form-horizontal" role="form">

  <div class="form-group">
      <label for="selectempleados" class="col-lg-4 control-label"> Empleados registrados:</label>
    <br>
  <input type="text" keyboard-poster post-function="searchempleados" list="_trabajadorlist" id="selectempleados"name="selectempleados"   ng-model="selecttrabajador"    ng-change="getempleadoselected(selecttrabajador)" style='margin-bottom: 100px'/> <!--ng-change="setNombreUnidad(selectclaveunidad)"-->
   <datalist id="_trabajadorlist">
   <select style="display: none;" id="_selectclavesunidad" name="_selectempleados" ng-model='selectempleado' ng-options='nombre  as empleado.nombrecompleto for empleado in empleados track by empleado.noempleado' >
     <option value="?" ></option>
   </select>
  </datalist>
</div>

  <div class="form-group row">
  <label for="empleado_rfc" class="col-xs-3 col-form-label mr-2">*RFC empleado</label>
  <div class="col-xs-9">
  <input class="form-control  form-control-sm" ng-model="EmpleadoActive.rfc"  id="empleado_rfc" name="empleado_rfc">
  </div>
  </div>
  <div class="form-group row">
  <label for="empleado_noempleado" class="col-xs-4 col-form-label mr-2"> *No empleado</label>
  <div class="col-xs-9">
  <input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.noempleado"  id="empleado_noempleado" name="empleado_noempleado">
  </div>
</div>

  <div class="form-group row">
  <label for="empleado_periodicidad" class="col-xs-5 col-form-label mr-2"> *Periodicidad del pago</label>
  <div class="col-xs-9">
  <input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.periodicidadpago"  id="empleado_periodicidad" name="empleado_periodicidad">
  </div>
  </div>

  <div class="form-group row">
  <label for="empleado_tipoderegimen" class="col-xs-5 col-form-label mr-2"> *Tipo Regimen</label>
  <div class="col-xs-9">
  <input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.tipoderegimen "  id="empleado_tipoderegimen " name="empleado_tipoderegimen ">
  </div>
</div>
  <div class="form-group row">
  <label for="empleado_riesgodelpuesto" class="col-xs-5 col-form-label mr-2"> Riesgo del puesto</label>
  <div class="col-xs-9">
  <input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.riesgodelpuesto "  id="empleado_riesgodelpuesto " name="empleado_riesgodelpuesto ">
  </div>
</div>
<div class="form-group row">
<label for="empleado_departamento" class="col-xs-5 col-form-label mr-2"> Departamento</label>
<div class="col-xs-9">
<input  class="form-control form-control-sm"  ng-model="EmpleadoActive.departamento"  id="empleado_departamento" name="empleado_departamento">
</div>
</div>
<div class="form-group row">
<label for="empleado_cuentabancaria" class="col-xs-5 col-form-label mr-2"> Cuentabancaria</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.cuentabancaria"  id="empleado_cuentabancaria" name="empleado_cuentabancaria">
</div>
</div>

<div class="form-group row">
<label for="empleado_nombrecompleto" class="col-xs-5 col-form-label mr-2"> *Nombre de empleado</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.nombrecompleto"  id="empleado_nombrecompleto" name="empleado_nombrecompleto">
</div>
</div>
<div class="form-group row">
<label for="empleado_curp" class="col-xs-5 col-form-label mr-2"> *CURP</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.curp"  id="empleado_curp" name="empleado_curp">
</div>
</div>
<div class="form-group row">
<label for="empleado_estado" class="col-xs-5 col-form-label mr-2"> *Entidad federativa</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.estado"  id="empleado_estado" name="empleado_estado">
</div>
</div>
<div class="form-group row">
<label for="empleado_nss" class="col-xs-5 col-form-label mr-2"> NSS:</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.nss"  id="empleado_nss" name="empleado_nss">
</div>
</div>
<div class="form-group row">
<label for="empleado_salariodiariointegrado" class="col-xs-5 col-form-label mr-3"> Salario diario Integrago:</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.salariodiariointegrado"  id="empleado_salariodiariointegrado" name="empleado_nss">
</div>
</div>
<div class="form-group row">
<label for="empleado_puesto" class="col-xs-5 col-form-label mr-2"> Puesto:</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.puesto"  id="empleado_puesto" name="empleado_puesto">
</div>
</div>

<div class="form-group row">
<label for="empleado_puesto" class="col-xs-5 col-form-label mr-2"> Banco:</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.banco"  id="empleado_banco" name="empleado_banco">
</div>
</div>


<div class="form-group row">
<label for="empleado_correo" class="col-xs-5 col-form-label mr-2"> E-mail:</label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.correo"  id="empleado_correo" name="empleado_correo">
</div>
</div>

<div class="form-group row">
<label for="empleado_tiponomina" class="col-xs-5 col-form-label mr-2">*Tipo de Nomina </label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.tiponomina"  id="empleado_tiponomina" name="empleado_tiponomina">
</div>
</div>

<div class="form-group row">
<label for="empleado_tipocontrato" class="col-xs-5 col-form-label mr-2">*Tipo de contrato </label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.tipocontrato"  id="empleado_tipocontrato" name="empleado_tipocontrato">
</div>
</div>

<div class="form-group row">
<label for="empleado_salarioyaportaciones" class="col-xs-5 col-form-label mr-2">Salario base,cuotas y aportaciones: </label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.salarioyaportaciones"  id="empleado_salarioyaportaciones" name="empleado_salarioyaportaciones">
</div>
</div>
<div class="form-group row">
<label for="empleado_tipojornada" class="col-xs-5 col-form-label mr-2">Tipo de jornada: </label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.tipojornada"  id="empleado_tipojornada" name="empleado_tipojornada">
</div>
</div>
<div class="form-group row">
<label for="empleado_sindicalizado" class="col-xs-5 col-form-label mr-2">Sindicalizado: </label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.sindicalizado"  id="empleado_sindicalizado" name="empleado_sindicalizado">
</div>
</div>

<div class="form-group row">
<label for="empleado_fechainicialrellab" class="col-xs-5 col-form-label mr-2">Fecha de inicio de relacion laboral: </label>
<div class="col-xs-9">
<input  class="form-control  form-control-sm"  ng-model="EmpleadoActive.fechainicialrellab"
  id="empleado_fechainicialrellab" name="empleado_fechainicialrellab"
  placeholder="yyyy-MM-ddTHH:mm:ss" min="2018-01-01T00:00:00" max="2018-12-31T23:59:59" required />

</div>
</div>


<!-- Aque van las percepciones Tipo de percepción select   Clave   concepto   importe gravado      importe exento  limpiar agregar agregar-->

<div id="divpercepciones">
<input type="checkbox" name="empleado_percepciones" value="percepciones">Agregar Percepciones
<div class="form-group">
      <label for="selectpercepciones" class="col-lg-4 control-label">Tipo de percepcion:</label>
     <select  id="selectpercepciones" name="selectpercepciones" ng-model='selectpercepcion' >
     <option ng-repeat="tipopercepcion in tipospercepcion" value="{{tipopercepcion.tipopercepcion}}">{{tipopercepcion.tipopercepcion+' - '+tipopercepcion.descripcion}}</option>
   </select>
</div>

<div class="form-group">
      <label for="percepcionclave_" class="col-lg-4 control-label">*clave</label>
      <div class="col-xs-9">
      <input type="text" id="percepcionclave_" name="percepcionclave_" ng-model="selectpercepcion">
    </div>
</div>

<div class="form-group">
      <label for="percepcionconcepto_" class="col-lg-4 control-label">*Concepto</label>
      <div class="col-xs-9">
      <textarea name="textarea" ng-model="percepcionconcepto" name="percepcionconcepto_" id="percepcionconcepto_"rows="5" cols="20"></textarea>
    </div>
</div>

<div class="form-group">
      <label for="percepcionimporte_" class="col-lg-4 control-label">*Importe Gravado</label>
      <div class="col-xs-9">
      <input type="text" id="percepcionimporte_" name="percepcionimporte_" ng-model="percepcionimporte">
    </div>
</div>
<div class="form-group">
      <label for="percepcionimporteexento_" class="col-lg-4 control-label">*Importe Exento</label>
      <div class="col-xs-9">
      <input type="text" id="percepcionimporteexento_" name="percepcionimporteexento_" ng-model="percepcionimporteexento">
    </div>
</div>
<div>
  <button type="button" ng-click="limpiarpercepcion()" class="btn btn-secondary">Limpiar</button>
  <button type="button" ng-click="agregarpercepcion()" class="btn btn-primary">Agregar</button>
</div>
<!--Concepto, importe gravado importe excento Limpar, Agregar percepción
Tipo de percepción, clave, importe gravado, importe exento, Concepto, Acciones {editar, eliminar}-->

<table>
  <tr>
    <th>Tipo de Percepcion</th>
    <th>clave</th>
    <th>importe</th>
    <th>importe Exento</th>
    <th>Concepto</th>
  </tr>
  <tr ng-repeat="percepcion in listpercepciones">
    <td>{{ percepcion.percepcion.tipopercepcion+" - "+percepcion.percepcion.descripcion }}</td>
    <td>{{ percepcion.percepcion.tipopercepcion}}</td>
    <td>{{ percepcion.importe}}</td>
    <td>{{ percepcion.importeexento}}</td>
    <td>{{ percepcion.concepto}}</td>
  </tr>
</table>

</div>

<!--fin de percepciones-->


 <div id="divdeducciones">
 <div class="form-group">
       <label for="selectipodeducciones" class="col-lg-4 control-label">Tipo de deducción:</label>
      <select  id="selectipodeducciones" name="selectipodeducciones" ng-model='selectedtipodeduccion' >
      <option ng-repeat="tipodeduccion in tiposdeduccion" value="{{tipodeduccion.tipodeduccion}}">{{tipodeduccion.tipodeduccion+' - '+tipodeduccion.descripcion}}</option>
    </select>
 </div>
 <div class="form-group">
       <label for="clavetipodeduccion_" class="col-lg-4 control-label">*clave</label>
       <div class="col-xs-9">
       <input type="text" id="clavetipodeduccion_" name="clavetipodeduccion_" ng-model="selectedtipodeduccion">
     </div>
 </div>

 <div class="form-group">
       <label for="deduccionconcepto_" class="col-lg-4 control-label">*Concepto</label>
       <div class="col-xs-9">
       <textarea name="textarea" ng-model="deduccionconcepto" name="deduccionimporte_" id="deduccionconcepto_"rows="5" cols="20"></textarea>
     </div>
 </div>
 <div class="form-group">
       <label for="deduccionimporte_" class="col-lg-4 control-label">*Importe</label>
       <div class="col-xs-9">
       <input type="text" id="deduccionimporte_" name="deduccionimporte_" ng-model="deduccionimporte">
     </div>
 </div>
 <div>
   <button type="button" ng-click="limpiardeduccion()" class="btn btn-secondary">Limpiar</button>
   <button type="button" ng-click="agregardeducicon()" class="btn btn-primary">Agregar</button>
 </div>

<div id="tablededucciones">
<table>
  <tr>
    <th>Tipo de deducción</th>
    <th>Clave</th>
    <th>Concepto</th>
    <th>Importe</th>
    <th>Acciones</th>
  </tr>
  <tr ng-repeat="deduccion in listdeducciones">
    <td>{{ deduccion.deduccion.tipodeduccion+" - "+deduccion.deduccion.descripcion }}</td>
    <td>{{ deduccion.deducion.tipodeduccion}}</td>
    <td>{{ deduccion.concepto}}</td>
    <td>{{ deduccion.importe}}</td>

  </tr>
</table>
 </div>
<div class="form-group">
      <label for="totalotrasdeducciones" class="col-lg-4 control-label">Total otras deducciones </label>
      <div class="col-xs-9">
      <input type="text" id="totalotrasdeducciones" name="totalotrasdeducciones" ng-model="totalotrasdeducciones">
    </div>
</div>
<div class="form-group">
      <label for="totalimpuestosretenidos" class="col-lg-4 control-label">Total impuestos retenidos </label>
      <div class="col-xs-9">
      <input type="text" id="totalimpuestosretenidos" name="totalimpuestosretenidos" ng-model="totalimpuestosretenidos">
    </div>
</div>

<div id="divtotales">
  <div class="form-group row">
        <label for="totalpercepciones" class="col-xs-5 col-form-label mr-2">  Total percepciones </label>
        <div class="col-xs-9">
        <input type="text" id="totalpercepciones" name="totalpercepciones" ng-model="totalpercepciones">
      </div>
  </div>
  <div class="form-group row">
        <label for="totaldeducciones" class="col-xs-5 col-form-label mr-2">Total deducciones: </label>
        <div class="col-xs-9">
        <input type="text" id="totaldeducciones" name="totaldeducciones" ng-model="totalotrasdeducciones">
      </div>
  </div>
  <div class="form-group row">
        <label for="totalimpuestosretenidos" class="col-xs-5 col-form-label mr-2">Total impuestos retenidos </label>
        <div class="col-xs-9">
        <input type="text" id="totalimpuestosretenidos" name="totalimpuestosretenidos" ng-model="totalimpuestosretenidos">
      </div>
  </div>
  <div class="form-group row">
        <label for="totalotrospagos" class="col-xs-5 col-form-label mr-2">  Total de otros pagos: </label>
        <div class="col-xs-9">
        <input type="text" id="totalotrospagos" name="totalotrospagos" ng-model="totalotrospagos">
      </div>
  </div>
  <div class="form-group row">
    <label for="subtotal" class="col-xs-5 col-form-label mr-2">  Subtotal: </label>
    <div class="col-xs-9">
    <input type="text" id="subtotal" name="subtotal" ng-model="subtotal">
        <label for="descuentos" class="col-xs-5 col-form-label mr-2">Descuentos: </label>
        <div class="col-xs-9">
        <input type="text" id="descuentos" name="descuentos" ng-model="descuento">
      </div>
      <label for="total" class="col-xs-5 col-form-label mr-2">Total: </label>
      <div class="col-xs-9">
      <input type="text" id="total" name="total" ng-model="total">
  </div>
</div>
</div>
</div>
<div>
  <button type="button" ng-click="guardar()" class="btn btn-secondary">Guardar</button>
  <button type="button" ng-click="timbrar()" class="btn btn-primary">Timbrar</button>
</div>

</form>
</div>
</body>
</html>
