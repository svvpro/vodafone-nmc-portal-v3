app.controller('PhonebookPagePageController', function ($scope, $http) {
    //Получаем список всех инженеров и предаем в $scope
    (function () {
        $http.get('http://portal.loc/api/engineers').then(function (data) {
            $scope.engineers = data;
        }, function () {

        });
    })();

   //Получаем список всех типов сервис кодов и предаем в $scope
    (function () {
        $http.get('http://portal.loc/api/departaments').then(function (data) {
            $scope.departaments = data;
        }, function () {

        });
    })();
});