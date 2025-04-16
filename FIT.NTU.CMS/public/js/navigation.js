(function () {
    const app = angular.module("cmsApp", []);

    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("NavigationsController", function ($scope, $http) {
        $scope.navigations = [];
        $scope.formData = {};
        $scope.modalTitle = "Add Navigation";

        let modal;

        $scope.init = function () {
            modal = new bootstrap.Modal(
                document.getElementById("navigationModal"),
            );
            $scope.fetchNavigations();
        };

        $scope.fetchNavigations = function () {
            $http.get("/api/navigations").then(function (response) {
                $scope.navigations = response.data;
            });
        };

        $scope.openNavigationModal = function (nav = null) {
            if (nav) {
                $scope.modalTitle = "Edit Navigation";
                $scope.formData = {
                    ...nav,
                    itemsStr: Array.isArray(nav.items)
                        ? nav.items.join(", ")
                        : "",
                };
            } else {
                $scope.modalTitle = "Add Navigation";
                $scope.formData = {
                    name: "",
                    itemsStr: "",
                };
            }
            modal.show();
        };

        $scope.saveNavigation = function () {
            const payload = {
                name: $scope.formData.name,
                items: $scope.formData.itemsStr
                    .split(",")
                    .map((i) => i.trim())
                    .filter((i) => i),
            };

            if ($scope.formData.id) {
                $http
                    .put("/api/navigations/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchNavigations();
                        modal.hide();
                    });
            } else {
                $http.post("/api/navigations", payload).then(() => {
                    $scope.fetchNavigations();
                    modal.hide();
                });
            }
        };

        $scope.deleteNavigation = function (id) {
            if (confirm("Are you sure you want to delete this navigation?")) {
                $http.delete("/api/navigations/" + id).then(() => {
                    $scope.fetchNavigations();
                });
            }
        };
    });
})();
