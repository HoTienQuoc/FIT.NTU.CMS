@extends('dashboard')
@section('content')

<div class="container" ng-controller="PagesController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Page Management</h3>
        <button class="btn btn-primary" ng-click="openPageModal()">Add Page</button>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="page in pages">
                <td>[[ page.title ]]</td>
                <td>[[ page.slug ]]</td>
                <td>[[ page.status ]]</td>
                <td>
                    <button class="btn btn-sm btn-warning me-1" ng-click="openPageModal(page)">Edit</button>
                    <button class="btn btn-sm btn-danger" ng-click="deletePage(page.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="pageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                            <textarea class="form-control" rows="4" ng-model="formData.content"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-control" ng-model="formData.status">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Meta</label>
                            <input type="text" class="form-control" ng-model="formData.metaStr" placeholder="title=Home,description=Welcome page" />
                        </div>

                        <div class="mb-3">
                            <label>Widgets</label>
                            <input type="text" class="form-control" ng-model="formData.widgetsStr" placeholder="slider,news,contact-form" />
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="savePage()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/page.js') }}"></script>
@endsection
