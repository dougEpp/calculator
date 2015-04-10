var App = angular.module('App', ['ngMaterial']);

App.controller('fvOrdinarySimpleAnnuityCtrl', function($scope, $window) {

	$scope.PMT = 500;
	$scope.I = 3;
	$scope.Icm = function() { return ($scope.I / 100) / 12;};
	$scope.N = 36;
	$scope.Tempiplus1 = function() { return (1 + parseFloat($scope.Icm()));};
	
	$scope.Iplus1s = function() { return $window.Math.pow($scope.Tempiplus1(), $scope.N);};
	$scope.FV = function(){ return (parseFloat($scope.PMT) * (($scope.Iplus1s() - 1)/parseFloat($scope.Icm())));};
	$scope.IE = function() { return $scope.FV() - ($scope.PMT * $scope.N);};
	});

App.controller('pvOrdinarySimpleAnnuityCtrl', function($scope, $window) {

	$scope.PMT = 450;
	$scope.I = 8;
	$scope.Icm = function() { return ($scope.I / 100) / 12;};
	$scope.N = 9;
	$scope.Tempiplus1 = function() { return (1 + parseFloat($scope.Icm()));};
	
	$scope.Iplus1s = function() { return $window.Math.pow($scope.Tempiplus1(), -$scope.N);};
	$scope.PV = function(){ return (parseFloat($scope.PMT) * (1 - ($scope.Iplus1s()))/parseFloat($scope.Icm()));};
	$scope.IP = function() { return ($scope.PMT * $scope.N) - $scope.PV();};
	});


App.controller('originalLoanAndBalanceCtrl', function($scope, $window) {

	$scope.PMT = 450;
	$scope.I = 8;
	$scope.Icm = function() { return ($scope.I / 100) / 12;};
	$scope.N = 9;
	$scope.Np = 4;
	$scope.Tempiplus1 = function() { return (1 + parseFloat($scope.Icm()));};
	
	$scope.Iplus1s = function() { return $window.Math.pow($scope.Tempiplus1(), -$scope.N);};
	$scope.Iplus1sNp = function() { return $window.Math.pow($scope.Tempiplus1(), -$scope.Np);};
	$scope.PV = function(){ return (parseFloat($scope.PMT) * (1 - ($scope.Iplus1s()))/parseFloat($scope.Icm()));};
	$scope.PVNp = function(){ return (parseFloat($scope.PMT) * (1 - ($scope.Iplus1sNp()))/parseFloat($scope.Icm()));};
	$scope.IP = function() { return ($scope.PMT * $scope.N) - $scope.PV();};
	});
    
App.controller('compareEconomicValueLump', function($scope, $window) {
    $scope.FV = 100000;
	$scope.I = 5;
	$scope.N = 5;
    $scope.downPayment = 25000;

<<<<<<< HEAD
	$scope.PMT = 450;
	$scope.I = 8;
	$scope.Icm = function() { return ($scope.I / 100) / 12;};
	$scope.N = 9;
	$scope.Tempiplus1 = function() { return (1 + parseFloat($scope.Icm()));};
	
	$scope.Iplus1s = function() { return $window.Math.pow($scope.Tempiplus1(), -$scope.N);};
	$scope.PV = function(){ return (parseFloat($scope.PMT) * (1 - ($scope.Iplus1s()))/parseFloat($scope.Icm()));};
	$scope.IP = function() { return ($scope.PMT * $scope.N) - $scope.PV();};
	});
	
App.controller('generalAnnuitiesCtrl', function($scope, $window) {

	$scope.PMT = 50;
	$scope.I = 6;
	$scope.C = 2;
	$scope.Ny = 1;
	$scope.N = 12;
	$scope.Ic = function() { return ($scope.I / 100) / $scope.C;};
	$scope.Tempiplus1 = function() { return (1 + parseFloat($scope.Ic()));};
	$scope.Cs = function() { return ($scope.C / $scope.N);};
	$scope.I2 = function() { return ($window.Math.pow($scope.Tempiplus1(), $scope.Cs()))-1;};
	$scope.TempI2plus1 = function() { return (1 + parseFloat($scope.I2()));};
	$scope.Nyc = function() { return parseFloat(($scope.N * $scope.Ny));};
	$scope.TempGA = function() { return ($window.Math.pow($scope.TempI2plus1(), $scope.Nyc()));};
	$scope.GA = function() { return ((parseFloat($scope.PMT) * ((parseFloat($scope.TempGA()))-1) / $scope.I2()));};
	

	});

=======
    $scope.PV = function() {
        return (parseFloat($scope.FV)) / ($window.Math.pow(1 + (parseFloat($scope.I) / 100), $scope.N));
    }
    $scope.total = function() {
        return $scope.PV() + parseFloat($scope.downPayment);
    }
});
App.controller('compareEconomicValuePmt', function($scope, $window) {
    $scope.PMT = 20000;
    $scope.downPayment = 16000;
    $scope.I = 5;
    $scope.N = 5;

    $scope.PV = function() {
        var presentValue = $scope.PMT;
        for (var i = 0; i < $scope.N - 1; i++) {
            presentValue = ((presentValue) / ($window.Math.pow(1 + (parseFloat($scope.I) / 100), 1))) + $scope.PMT;
        }
        return ((presentValue) / ($window.Math.pow(1 + (parseFloat($scope.I) / 100), 1)));
    }

    $scope.total = function() {
        return $scope.PV() + $scope.downPayment;
    }
});
>>>>>>> origin/master
    
    
    

App.controller('sidebarCtrl', function($scope) {

	});
	
App.controller('global', function($scope) {
	$scope.ordinarySimpleAnnuity = true,
	$scope.compareEconomicValue = true,
	$scope.originalLoanAndBalance = true,
	$scope.generalAnnuities = true,

	$scope.ordinarySimpleAnnuityClick = function() 
	{
			$scope.ordinarySimpleAnnuity = false;
			$scope.compareEconomicValue = true;
			$scope.originalLoanAndBalance = true;
			$scope.generalAnnuities = true;
	}
	$scope.compareEconomicValueClick = function() 
	{
			$scope.compareEconomicValue = false;
			$scope.ordinarySimpleAnnuity = true;
			$scope.originalLoanAndBalance = true;
			$scope.generalAnnuities = true;
	}
	$scope.originalLoanAndBalanceClick = function() 
	{
			$scope.originalLoanAndBalance = false;
			$scope.ordinarySimpleAnnuity = true;
			$scope.compareEconomicValue = true;
			$scope.generalAnnuities = true;
	}
	$scope.generalAnnuitiesClick = function() 
	{
			$scope.generalAnnuities = false;
			$scope.originalLoanAndBalance = true;
			$scope.ordinarySimpleAnnuity = true;
			$scope.compareEconomicValue = true;
	}
	
});
App.config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default')
    .primaryPalette('yellow')
    .backgroundPalette('yellow')
    .accentPalette('yellow');
});


