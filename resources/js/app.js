var app = angular.module('mine', ['ui.router','ngMask','720kb.datepicker'])

.config(function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("app/Home");
    $stateProvider        
        .state('menu', {
          url: "/app",
          templateUrl: "partials/menu.html",
          controller: "menuCtrl"
        })
        .state('menu.home', {
          url: "/Home",
          templateUrl: "views/home.html",
          controller: "homeCtrl"
        })        
        .state('menu.login', {
          url: "/Login",
          templateUrl: "partials/login.html",
          controller: "menuCtrl"
        })
}) 

.service('DateProvider', function () {

    this.date = new Date();
    this.payment = new Date();
    
    this.today = function () {
        return this.date.getDate();
    }

    this.dayOfWeek = function () {
        return this.date.getDay();
    }

    this.getHour = function (){
        return this.date.getHours() + ':' + this.date.getMinutes();
    } 

    this.toPayDay = function (){
        var febDate  = new Date(2010, 1, 14); //Month is 0-11 in JavaScript
        febDate.setDate(30);
        return febDate.toDateString();
    };
});

app.controller("homeCtrl", ['$scope', '$http', '$rootScope','DateProvider', function ($s, $http, $rs, Date) {

    $s.viewTarefa = function(tarefa){
        $s.tarefaselecionada = tarefa;
    }

}]);

app.controller("menuCtrl", ['$scope', '$http', '$rootScope','$location', function ($s, $http, $rs, $location) {            
        
    $s.teste = function(){
        console.log("working");
    }
        
    $s.showToast = function(message){
        Materialize.toast(message, 3000);
    };

   $s.goRota = function(rota){ 
        if (rota) {
            $location.path(rota);
        }
    };

    $s.verificaUserSession = function(){
        $s.p = 'verifyUserSession';
        $http.get("server/dao/redirect.php?p="+$s.p).success(function(result) {
            if (result != 'false') {                    
                $rs.user = result[0];
            } else {
                $s.showToast("Sessão expirada!");
                $s.goRota('/Login');                
            }    
        });
    };

    $s.userAuth = function(oUser){            
        $s.p = 'userAuth';
        $http.post("server/dao/redirect.php?p=" + $s.p, {
            oUser: oUser            
        });
        $s.goRota('Home');        
    };         

    $s.getCustos = function(){  
        $s.p = 'getCustos';
        $http.get("server/dao/redirect.php?p="+$s.p).success(function(result) {
            $s.custos = result;
        });
    }   

    $s.getTarefas = function(){  
        $s.p = 'getTarefas';
        $http.get("server/dao/redirect.php?p="+$s.p).success(function(result) {            
            $s.tarefas = result;
        });
    }   

    $s.getHoras = function(){  
        $s.p = 'getHoras';
        $http.get("server/dao/redirect.php?p="+$s.p).success(function(result) {
            $s.horas = result;
        }); 
    }

    $s.sendHora = function(oHora){
        $s.p = 'inputHora';
        $http.post("server/dao/redirect.php?p=" + $s.p, {
            oHora: oHora
        }).success($s.getHoras());
        oHora = [];        
    }    

    $s.sendCusto = function(oCusto){
        console.log(oCusto);
        $s.p = 'inputCusto';
        $http.post("server/dao/redirect.php?p=" + $s.p, {
            oCusto: oCusto
        }).success($s.getCustos());
        oCusto = [];
    }    

    $s.sendTarefa = function(oTarefa){
        $s.p = 'inputTarefa';
        $http.post("server/dao/redirect.php?p=" + $s.p, {
            oTarefa: oTarefa
        }).success($s.getTarefas());
        oTarefa = [];
    }     

    $s.getCustos();
    $s.getTarefas();
    $s.getHoras();
    
    $s.updateAll = function (){
        $s.getCustos();
        $s.getTarefas();
        $s.getHoras();
    }

    $s.deleteHora = function(codhora){
        $s.p = 'deleteHora';
        $http.post("server/dao/redirect.php?p=" + $s.p, codhora).success($s.getHoras());
        
    }    

    $s.deleteCusto = function(codcusto){
        $s.p = 'deleteCusto';
        $http.post("server/dao/redirect.php?p=" + $s.p, codcusto).success($s.getCustos());
        
    }    

    $s.deleteTarefa = function(codtarefa){
        $s.p = 'deleteTarefa';
        $http.post("server/dao/redirect.php?p=" + $s.p, codtarefa).success($s.getTarefas());
        
    }     

    $s.changeTarefa = function(codtarefa){
        $s.p = 'changeTarefa';
        $http.post("server/dao/redirect.php?p=" + $s.p, codtarefa).success($s.getTarefas());
    }

}]);


