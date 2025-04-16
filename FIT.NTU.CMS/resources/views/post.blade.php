@extends('dashboard')
@section('content')

<div class="container" ng-controller="PostsController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Post Management</h3>
        <button class="btn btn-primary" ng-click="openPostModal()">Add Post</button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Tags</th>
                <th>Author ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="post in posts">
                <td>[[ post.title ]]</td>
                <td>[[ post.slug ]]</td>
                <td>[[ post.status ]]</td>
                <td>[[ post.tags.join(', ') ]]</td>
                <td>[[ post.author_id ]]</td>
                <td>
                    <button class="btn btn-sm btn-warning me-1" ng-click="openPostModal(post)">Edit</button>
                    <button class="btn btn-sm btn-danger" ng-click="deletePost(post.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">[[ modalTitle ]]</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" ng-model="formData.title" required />
                        </div>
                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" class="form-control" ng-model="formData.slug" required />
                        </div>
                        <div class="mb-3">
                            <label>Content</label>
                            <textarea class="form-control" ng-model="formData.content" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-control" ng-model="formData.status">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Tags (comma-separated)</label>
                            <input type="text" class="form-control" ng-model="formData.tagsStr" />
                        </div>
                        <div class="mb-3">
                            <label>Author ID</label>
                            <input type="text" class="form-control" ng-model="formData.author_id" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="savePost()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/post.js') }}"></script>
@endsection
