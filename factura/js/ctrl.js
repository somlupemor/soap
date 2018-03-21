app.controller('ctrlEmisor', function($scope,$http) {
    $scope.Emisor="";
    $scope.Emisor_razon= "";

    $http({
        method : "GET",
        url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
        params: {request: "emisor"}
    }).then(function mySuccess(response) {
        $scope.Emisor=response.data;
        $scope.emisor_regimenfiscalObject = response.data.regimenfiscaldesc;
      },function myError(response) {

      });

        $http({
            method : "GET",
            url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
            params: {request: "tipocfdi"}
        }).then(function mySuccess(response) {
            $scope.tipocfdi=response.data;
        }, function myError(response) {
        });

        $http({
            method : "GET",
            url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
            params: {request: "getmonedas"}
        }).then(function mySuccess(response) {
            $scope.monedas=response.data;
        }, function myError(response) {
        });

        $http({
            method : "GET",
            url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
            params: {request: "getformaspago"}
        }).then(function mySuccess(response) {
            $scope.formaspago=response.data;
        }, function myError(response) {
        });


        $http({
            method : "GET",
            url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
            params: {request: "getmetodospago"}
        }).then(function mySuccess(response) {
            $scope.metodospago=response.data;
        }, function myError(response) {
        });


    var f=new Date();
    $scope.fechaemision=new Date();
});



app.controller('ctrlReceptor', function($scope,$http) {
  $http({
      method : "GET",
      url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
      params: {request: "receptoresreg"}
  }).then(function mySuccess(response) {
      $scope.receptores=response.data;
  }, function myError(response) {
  });


  $http({
      method : "GET",
      url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
      params: {request: "usocfdi"}
  }).then(function mySuccess(response) {
      $scope.usocfdi=response.data;
  }, function myError(response) {
  });

});

app.controller('ctrlConcepto', function($scope,Claveprodserv) {
 //$scope.selectedclaveprodserv = null;

 });

 app.service('claveprodserv2', function($q,$http) {
     this.getcalveprodserv = function () {
       var deferred = $q.defer();
       var promise=deferred.promise;
       $http({
           method : "GET",
           url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
           params: {request: "getclaveprodserv"}
       }).then(function mySuccess(response) {
           var _clavesprodserv={}
           var clavesprodserv=response.data;
           for(var i = 0, len = clavesprodserv.length; i < len; i++) {
             _clavesprodserv[clavesprodserv[i].claveprodserv] = clavesprodserv[i].Descripcion;
           }
             deferred.resolve(_clavesprodserv);
       }, function myError(response) {
           deferred.reject(response);
       });
       return promise;
     };
   });


   app.service('claveprodserv', function($http,$q) {
     return {
        getclaveprodserv: getclaveprodserv
      }
    function getclaveprodserv (clave) {
        var defered = $q.defer();
        var promise = defered.promise;

        $http({
            method : "GET",
            url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
            params: {request: "getclaveprodserv"}
        }).then(function mySuccess(response) {
            var _clavesprodserv={}
            var clavesprodserv=response.data;
            /*for(var i = 0, len = clavesprodserv.length; i < len; i++) {
              _clavesprodserv[clavesprodserv[i].claveprodserv] =clavesprodserv[i].claveprodserv +"|"+clavesprodserv[i].descripcion;
            }*/
            defered.resolve(clavesprodserv);
        }, function myError(response) {
            defered.reject(response);
        });
        return promise;
    }
    });

    app.service('claveunindad', function($http,$q) {
      return {
         getclavesunidad: getclavesunidad
       }
     function getclavesunidad (clave) {
         var defered = $q.defer();
         var promise = defered.promise;

         $http({
             method : "GET",
             url : "http://localhost/siteserver/facturacion/factura/logica/factura33l.php",
             params: {request: "getclavesunidad"}
         }).then(function mySuccess(response) {
             var clavesprodserv=response.data;
             /*for(var i = 0, len = clavesprodserv.length; i < len; i++) {
               _clavesprodserv[clavesprodserv[i].claveprodserv] =clavesprodserv[i].claveprodserv +"|"+clavesprodserv[i].descripcion;
             }*/
             defered.resolve(clavesprodserv);
         }, function myError(response) {
             defered.reject(response);
         });
         return promise;
     }
     });


app.controller('ControllerConcepto', function($scope,claveprodserv,claveunindad,$rootScope,$http,$filter) {
  //Cada vez que modifiquemos el contenido del campo de texto haremos una
  //petición a nuestra base de datos con valores relacionados
      $scope.selectclaveproserv = null;
      $scope.selectclaveunidad = null;
      $scope.servicio=null;
      $scope.clavesunidad=null;
      $scope.conceptocantidad=1;
      $scope.conceptonoidentificacion=null;
      $scope.conceptodescripcion=null;
      $scope.conceptovalorunitario="0.00";
      $scope.conceptoimporte="0.00";
      $scope.calcconceptoimporte=function(){
        $scope.conceptoimporte= $scope.conceptocantidad*$scope.conceptovalorunitario;
        console.log("algo");
      };






      $scope.searchclaveprodserv=function(clave){
        claveprodserv
          .getclaveprodserv(clave)
          .then(function(clavesprodserv) {
            $rootScope.clavesprodserv=clavesprodserv;
            $scope.clavesprodserv = clavesprodserv;
         }).catch(function(err) {
             console.log(err);
         });
       }

       $scope.searchclaveunidad=function(clave){

         claveunindad
           .getclavesunidad(clave)
           .then(function(clavesunidad) {
             $rootScope.clavesunidad=clavesunidad;
             $scope.clavesunidad = clavesunidad;
          }).catch(function(err) {
              // Tratar el error
              console.log(err);
          });
        }




     $scope.setNombreUnidad=function(selectclaveproserv){
       console.log("cambiando"+selectclaveproserv);
       if($scope.clavesunidad!=null)
       console.log($scope.servicio= $filter('filter')($scope.clavesunidad, {claveunidad: selectclaveproserv}, true)[0]);
         //$scope.nombreservicio=$scope.clavesunidad[$scope.selectclaveunidad].nombre;
       //$scope.clavesunidad[$scope.selectclaveunidad].nombre;

     }
       //$scope.$watch('selectclaveproserv',setNombreUnidad);


      $scope.cambiaclaveprodserv = function(claveprodserv){
      $scope.claveprodserv = claveprodserv;
      //$scope.clavesprodserv = null;
    }

});



app.directive('keyboardPoster', function($parse, $timeout){
  var DELAY_TIME_BEFORE_POSTING = 0;
  return function(scope, elem, attrs) {
    var element = angular.element(elem)[0];
    var currentTimeout = null;
    element.oninput = function() {
      console.log("function"+ attrs.postFunction+" ");
      var model = $parse(attrs.postFunction);

      var poster = model(scope);

      if(currentTimeout) {
        $timeout.cancel(currentTimeout)
      }
      currentTimeout = $timeout(function(){
        poster(angular.element(element).val());
      }, DELAY_TIME_BEFORE_POSTING)
    }
  }
})
