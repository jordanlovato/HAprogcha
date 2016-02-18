(function() {
 var app = angular.module('app', []);
 app.controller('listContactsCtrl', ['$scope', '$http',  function($scope, $http) {
		$scope.currSort = "lname";
		$scope.currDirection = true;
		$scope.query = "";
		$scope.queryList = [];
		
		$scope.deleteContact = function(indexToDelete) {
			$http.delete('/contact/'+$scope.contacts[indexToDelete]['_id']);
			location.reload();
			return;
		};

		$scope.toggleDirection = function() {
			$scope.currDirection = !$scope.currDirection;
		};

		$scope.setSort = function(prop) {
			if ($scope.currSort == prop) $scope.toggleDirection();
			$scope.currSort = prop;
		};

		function filter_small_data_set()
		{
			if ( $scope.query == "" )
			{
				$scope.queryList = $scope.contacts;
			}
			else
			{
				$scope.queryList = queryList($scope.contacts, $scope.query);
			}
		}

		function queryList(query_set, q)
	 	{
			return query_set.filter(function(el)
			{
				for (var property in el)
				{
					if ( el.hasOwnProperty(property) && el[property] !== null )
					{
				 		if ( stristr(q, el[property]) )
							return true;
				 	}
				}

				return false;
			});
		}

		function stristr(needle, haystack)
		{
			return (haystack.toString().toLowerCase().indexOf(needle.toLowerCase()) >= 0);
		}

		$scope.$watchCollection($scope.contacts, function(nc, oc) {
			if (typeof nc !== "undefined" && nc.length > 0)
			{
				$scope.queryList = $scope.contacts;
			}
		});

		$scope.$watch('query', function(nq, oq)	{
			filter_small_data_set();
		});
 }]);
}());
