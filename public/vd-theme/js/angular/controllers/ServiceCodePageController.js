app.controller('ServiceCodePageController', function ($scope, $http) {
    (function () {
        $http.get('http://portal.loc/api/service-codes').then(function (data) {
            $scope.serviceCodes = data;
        }, function () {

        });
    })();

    (function () {
        $http.get('http://portal.loc/api/service-code-types').then(function (data) {
            $scope.serviceCodeTypes = data;
        }, function () {

        });
    })();
});