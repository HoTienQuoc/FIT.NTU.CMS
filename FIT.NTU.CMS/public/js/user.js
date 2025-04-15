(function () {
    const app = angular.module("cmsApp", []);
    // Configure new symbols [[ ]] instead of {{ }}
    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("UsersController", function ($scope, $http) {
        $scope.users = [];
        $scope.formData = {};
        $scope.modalTitle = "Add User";

        let modal;

        $scope.init = function () {
            console.log("Quoc1");
            modal = new bootstrap.Modal(document.getElementById("userModal"));
            $scope.fetchUsers();
        };

        $scope.fetchUsers = function () {
            $http.get("/api/users").then(function (response) {
                $scope.users = response.data;
                console.log($scope.users);
            });
        };

        $scope.openUserModal = function (user = null) {
            if (user) {
                $scope.modalTitle = "Edit User";
                $scope.formData = { ...user, rolesStr: user.roles.join(", ") };
            } else {
                $scope.modalTitle = "Add User";
                $scope.formData = { name: "", email: "", rolesStr: "" };
            }
            modal.show();
        };

        $scope.saveUser = function () {
            const payload = {
                name: $scope.formData.name,
                email: $scope.formData.email,
                password: $scope.formData.password,
                roles: $scope.formData.rolesStr.split(",").map((r) => r.trim()),
            };
            console.log(payload);
            if ($scope.formData.id) {
                $http
                    .put("/api/users/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchUsers();
                        modal.hide();
                    });
            } else {
                $http.post("/api/users", payload).then(() => {
                    $scope.fetchUsers();
                    modal.hide();
                });
            }
        };

        $scope.deleteUser = function (userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                $http.delete("/api/users/" + userId).then(() => {
                    $scope.fetchUsers();
                });
            }
        };
    });
})();
