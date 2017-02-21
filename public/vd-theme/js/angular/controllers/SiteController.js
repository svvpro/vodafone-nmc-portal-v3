app.controller('SiteController', function ($scope, $http) {
    $scope.orderProp = 'id';
    $scope.direction = false;
    $scope.sort = function(column) {
        if ($scope.orderProp === column) {
            $scope.direction = !$scope.direction;
        } else {
            $scope.orderProp = column;
            $scope.direction = false;
        }
    }
});