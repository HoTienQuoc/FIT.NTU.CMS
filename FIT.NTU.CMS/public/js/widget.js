(function () {
    const app = angular.module("cmsApp", []);

    // Dùng [[ ]] thay cho {{ }}
    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("WidgetsController", function ($scope, $http) {
        $scope.widgets = [];
        $scope.formData = {};
        $scope.modalTitle = "Add Widget";

        let modal;

        $scope.init = function () {
            modal = new bootstrap.Modal(document.getElementById("widgetModal"));
            $scope.fetchWidgets();
        };

        $scope.fetchWidgets = function () {
            $http.get("/api/widgets").then(function (response) {
                $scope.widgets = response.data;
            });
        };

        $scope.openWidgetModal = function (widget = null) {
            if (widget) {
                $scope.modalTitle = "Edit Widget";
                $scope.formData = {
                    ...widget,
                    configStr: Object.entries(widget.config || {})
                        .map(([k, v]) => `${k}=${v}`)
                        .join(","),
                };
            } else {
                $scope.modalTitle = "Add Widget";
                $scope.formData = {
                    name: "",
                    type: "",
                    position: "",
                    configStr: "",
                    content: "",
                    enabled: true,
                };
            }
            modal.show();
        };

        $scope.saveWidget = function () {
            const config = {};
            if ($scope.formData.configStr) {
                $scope.formData.configStr.split(",").forEach((pair) => {
                    const [k, v] = pair.split("=");
                    if (k && v !== undefined) config[k.trim()] = v.trim();
                });
            }

            const payload = {
                name: $scope.formData.name,
                type: $scope.formData.type,
                position: $scope.formData.position,
                config: config,
                content: $scope.formData.content,
                enabled: !!$scope.formData.enabled,
            };

            if ($scope.formData.id) {
                $http
                    .put("/api/widgets/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchWidgets();
                        modal.hide();
                    });
            } else {
                $http.post("/api/widgets", payload).then(() => {
                    $scope.fetchWidgets();
                    modal.hide();
                });
            }
        };

        $scope.deleteWidget = function (widgetId) {
            if (confirm("Are you sure you want to delete this widget?")) {
                $http.delete("/api/widgets/" + widgetId).then(() => {
                    $scope.fetchWidgets();
                });
            }
        };
    });
})();
