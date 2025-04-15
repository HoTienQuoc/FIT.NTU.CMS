(function () {
    const app = angular.module("cmsApp", []);
    // Configure new symbols [[ ]] instead of {{ }}
    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("RolesController", function ($scope, $http) {
        $scope.roles = [];
        $scope.formData = {};
        $scope.modalTitle = "Add Role";

        let modal;

        $scope.init = function () {
            console.log("Quoc1");
            modal = new bootstrap.Modal(document.getElementById("roleModal"));
            $scope.fetchRoles();
        };

        $scope.fetchRoles = function () {
            $http.get("/api/roles").then(function (response) {
                $scope.roles = response.data;
                console.log($scope.roles);
            });
        };

        $scope.openRoleModal = function (roleName = null) {
            if (roleName) {
                $scope.modalTitle = "Edit Role";
                $scope.formData = {
                    ...roleName,
                };
            } else {
                $scope.modalTitle = "Add Role";
                $scope.formData = { roleName: "" };
            }
            modal.show();
        };

        $scope.saveRole = function () {
            const payload = {
                roleName: $scope.formData.roleName,
            };
            console.log(payload);
            if ($scope.formData.id) {
                $http
                    .put("/api/roles/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchRoles();
                        modal.hide();
                    });
            } else {
                $http.post("/api/roles", payload).then(() => {
                    $scope.fetchRoles();
                    modal.hide();
                });
            }
        };

        $scope.deleteRole = function (roleId) {
            if (confirm("Are you sure you want to delete this role?")) {
                $http.delete("/api/roles/" + roleId).then(() => {
                    $scope.fetchRoles();
                });
            }
        };
    });
})();
