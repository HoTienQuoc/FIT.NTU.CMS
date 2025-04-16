(function () {
    const app = angular.module("cmsApp", []);
    app.config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol("[[");
        $interpolateProvider.endSymbol("]]");
    });

    app.controller("PostsController", function ($scope, $http) {
        $scope.posts = [];
        $scope.formData = {};
        $scope.modalTitle = "Add Post";

        let modal;

        $scope.init = function () {
            modal = new bootstrap.Modal(document.getElementById("postModal"));
            $scope.fetchPosts();
        };

        $scope.fetchPosts = function () {
            $http.get("/api/posts").then(function (response) {
                $scope.posts = response.data;
            });
        };

        $scope.openPostModal = function (post = null) {
            if (post) {
                $scope.modalTitle = "Edit Post";
                $scope.formData = { ...post, tagsStr: post.tags.join(", ") };
            } else {
                $scope.modalTitle = "Add Post";
                $scope.formData = {
                    title: "",
                    slug: "",
                    content: "",
                    status: "draft",
                    tagsStr: "",
                    author_id: "",
                };
            }
            modal.show();
        };

        $scope.savePost = function () {
            const payload = {
                title: $scope.formData.title,
                slug: $scope.formData.slug,
                content: $scope.formData.content,
                status: $scope.formData.status,
                tags: $scope.formData.tagsStr.split(",").map((t) => t.trim()),
                author_id: $scope.formData.author_id,
            };

            if ($scope.formData.id) {
                $http
                    .put("/api/posts/" + $scope.formData.id, payload)
                    .then(() => {
                        $scope.fetchPosts();
                        modal.hide();
                    });
            } else {
                $http.post("/api/posts", payload).then(() => {
                    $scope.fetchPosts();
                    modal.hide();
                });
            }
        };

        $scope.deletePost = function (postId) {
            if (confirm("Are you sure you want to delete this post?")) {
                $http.delete("/api/posts/" + postId).then(() => {
                    $scope.fetchPosts();
                });
            }
        };
    });
})();
