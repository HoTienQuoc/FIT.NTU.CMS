@extends('dashboard')

@section('content')
<div class="container" ng-controller="PermissionsController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Permission Management</h3>
        <button class="btn btn-primary" ng-click="openPermissionModal()">Add Permission</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="permission in permissions">
                <td>[[ permission.name ]]</td>
                <td>[[ permission.slug ]]</td>
                <td>[[ permission.description ]]</td>
                <td>
                    <button class="btn btn-sm btn-warning me-1" ng-click="openPermissionModal(permission)">Edit</button>
                    <button class="btn btn-sm btn-danger" ng-click="deletePermission(permission.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="permissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">[[ modalTitle ]]</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" ng-model="formData.name" required />
                        </div>
                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" class="form-control" ng-model="formData.slug" required />
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea class="form-control" ng-model="formData.description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" ng-click="savePermission()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/permission.js') }}"></script>
@endsection
