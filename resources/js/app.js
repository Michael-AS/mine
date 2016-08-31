var app = angular.module('sup', ['ui.router','ngMask'])

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

app.controller("menuCtrl", ['$scope', '$http', '$rootScope', function ($s, $http, $rs) {                  

    $s.getUsers = function(){  
        $s.p = 'getUsers';
        $http.get("server/dao/redirect.php?p="+$s.p).success(function(result) {
            $s.users = result;
        });
    }   
    $s.getUsers();

    $s.aStatus = [
        {"status":"todo", "apelido":"TO DO"}, 
        {"status":"doing", "apelido":"DOING"}, 
        {"status":"done", "apelido":"DONE"}
    ];

    $s.sendTarefa = function(oTarefa){
        $s.p = 'inputTarefa';
        console.l
        $http.post("server/dao/redirect.php?p=" + $s.p, {
            oTarefa: oTarefa
        });
        oTarefa = [];
        $s.getUsers();
    }    

    $s.sendUser = function(oUser){
        $s.p = 'inputUser';
        console.l
        $http.post("server/dao/redirect.php?p=" + $s.p, {
            oUser: oUser
        });
        $s.getUsers();
    }

}]);


