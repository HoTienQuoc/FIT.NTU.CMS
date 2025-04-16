(function () {
    const app = angular.module("cmsApp", []);

    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("ThemesController", function ($scope, $http) {
        $scope.themes = [];
        $scope.formData = {};
        $scope.modalTitle = "Add Theme";

        let modal;

        $scope.init = function () {
            modal = new bootstrap.Modal(document.getElementById("themeModal"));
            $scope.fetchThemes();
        };

        $scope.fetchThemes = function () {
            $http.get("/api/themes").then(function (response) {
                $scope.themes = response.data;
            });
        };

        $scope.openThemeModal = function (theme = null) {
            if (theme) {
                $scope.modalTitle = "Edit Theme";
                $scope.formData = {
                    ...theme,
                    widget_positions_str: Array.isArray(theme.widget_positions)
                        ? theme.widget_positions.join(", ")
                        : "",
                };
            } else {
                $scope.modalTitle = "Add Theme";
                $scope.formData = {
                    name: "",
                    description: "",
                    folder: "",
                    widget_positions_str: "",
                };
            }
            modal.show();
        };

        $scope.saveTheme = function () {
            const payload = {
                name: $scope.formData.name,
                description: $scope.formData.description,
                folder: $scope.formData.folder,
                widget_positions: $scope.formData.widget_positions_str
                    .split(",")
                    .map((p) => p.trim())
                    .filter((p) => p),
            };

            if ($scope.formData.id) {
                $http
                    .put("/api/themes/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchThemes();
                        modal.hide();
                    });
            } else {
                $http.post("/api/themes", payload).then(() => {
                    $scope.fetchThemes();
                    modal.hide();
                });
            }
        };

        $scope.deleteTheme = function (id) {
            if (confirm("Are you sure you want to delete this theme?")) {
                $http.delete("/api/themes/" + id).then(() => {
                    $scope.fetchThemes();
                });
            }
        };
    });
})();
