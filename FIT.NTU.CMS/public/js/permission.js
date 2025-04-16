(function () {
    const app = angular.module("cmsApp", []);

    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("PermissionsController", function ($scope, $http) {
        $scope.permissions = [];
        $scope.formData = {};
        $scope.modalTitle = "Add Permission";

        let modal;

        $scope.init = function () {
            modal = new bootstrap.Modal(
                document.getElementById("permissionModal"),
            );
            $scope.fetchPermissions();
        };

        $scope.fetchPermissions = function () {
            $http.get("/api/permissions").then(function (response) {
                $scope.permissions = response.data;
            });
        };

        $scope.openPermissionModal = function (permission = null) {
            if (permission) {
                $scope.modalTitle = "Edit Permission";
                $scope.formData = { ...permission };
            } else {
                $scope.modalTitle = "Add Permission";
                $scope.formData = { name: "", slug: "", description: "" };
            }
            modal.show();
        };

        $scope.savePermission = function () {
            const payload = {
                name: $scope.formData.name,
                slug: $scope.formData.slug,
                description: $scope.formData.description,
            };

            if ($scope.formData.id) {
                $http
                    .put("/api/permissions/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchPermissions();
                        modal.hide();
                    });
            } else {
                $http.post("/api/permissions", payload).then(() => {
                    $scope.fetchPermissions();
                    modal.hide();
                });
            }
        };

        $scope.deletePermission = function (id) {
            if (confirm("Are you sure you want to delete this permission?")) {
                $http.delete("/api/permissions/" + id).then(() => {
                    $scope.fetchPermissions();
                });
            }
        };
    });
})();
