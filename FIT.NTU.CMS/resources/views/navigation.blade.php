@extends('dashboard')

@section('content')
<div class="container" ng-controller="NavigationsController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Navigation Management</h3>
        <button class="btn btn-primary" ng-click="openNavigationModal()">Add Navigation</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Items</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="nav in navigations">
                <td>[[ nav.name ]]</td>
                <td>[[ nav.items.join(', ') ]]</td>
                <td>
                    <button class="btn btn-sm btn-warning me-1" ng-click="openNavigationModal(nav)">Edit</button>
                    <button class="btn btn-sm btn-danger" ng-click="deleteNavigation(nav.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="navigationModal" tabindex="-1" aria-hidden="true">
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
                            <label>Items (comma-separated)</label>
                            <input type="text" class="form-control" ng-model="formData.itemsStr" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" ng-click="saveNavigation()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/navigation.js') }}"></script>
@endsection
