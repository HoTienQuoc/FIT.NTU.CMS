(function () {
    const app = angular.module("cmsApp", []);
    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("PagesController", function ($scope, $http) {
        $scope.pages = [];
        $scope.formData = {};
        $scope.modalTitle = "Add Page";

        let modal;

        $scope.init = function () {
            modal = new bootstrap.Modal(document.getElementById("pageModal"));
            $scope.fetchPages();
        };

        $scope.fetchPages = function () {
            $http.get("/api/pages").then(function (response) {
                $scope.pages = response.data;
            });
        };

        $scope.openPageModal = function (page = null) {
            if (page) {
                $scope.modalTitle = "Edit Page";
                $scope.formData = {
                    ...page,
                    metaStr: Object.entries(page.meta || {})
                        .map(([k, v]) => `${k}=${v}`)
                        .join(","),
                    widgetsStr: (page.widgets || []).join(","),
                };
            } else {
                $scope.modalTitle = "Add Page";
                $scope.formData = {
                    title: "",
                    slug: "",
                    content: "",
                    status: "draft",
                    metaStr: "",
                    widgetsStr: "",
                };
            }
            modal.show();
        };

        $scope.savePage = function () {
            const meta = {};
            if ($scope.formData.metaStr) {
                $scope.formData.metaStr.split(",").forEach((pair) => {
                    const [k, v] = pair.split("=");
                    if (k && v !== undefined) meta[k.trim()] = v.trim();
                });
            }

            const widgets = $scope.formData.widgetsStr
                ? $scope.formData.widgetsStr
                      .split(",")
                      .map((w) => w.trim())
                      .filter(Boolean)
                : [];

            const payload = {
                title: $scope.formData.title,
                slug: $scope.formData.slug,
                content: $scope.formData.content,
                status: $scope.formData.status,
                meta: meta,
                widgets: widgets,
            };

            if ($scope.formData.id) {
                $http
                    .put("/api/pages/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchPages();
                        modal.hide();
                    });
            } else {
                $http.post("/api/pages", payload).then(() => {
                    $scope.fetchPages();
                    modal.hide();
                });
            }
        };

        $scope.deletePage = function (pageId) {
            if (confirm("Are you sure you want to delete this page?")) {
                $http.delete("/api/pages/" + pageId).then(() => {
                    $scope.fetchPages();
                });
            }
        };
    });
})();
