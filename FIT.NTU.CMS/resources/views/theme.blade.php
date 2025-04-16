@extends('dashboard')

@section('content')
<div class="container" ng-controller="ThemesController" ng-init="init()">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Theme Management</h3>
        <button class="btn btn-primary" ng-click="openThemeModal()">Add Theme</button>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Folder</th>
                <th>Widget Positions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="theme in themes">
                <td>[[ theme.name ]]</td>
                <td>[[ theme.description ]]</td>
                <td>[[ theme.folder ]]</td>
                <td>[[ theme.widget_positions.join(', ') ]]</td>
                <td>
                    <button class="btn btn-sm btn-warning me-1" ng-click="openThemeModal(theme)">Edit</button>
                    <button class="btn btn-sm btn-danger" ng-click="deleteTheme(theme.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="themeModal" tabindex="-1" aria-hidden="true">
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
                            <label>Description</label>
                            <textarea class="form-control" ng-model="formData.description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Folder</label>
                            <input type="text" class="form-control" ng-model="formData.folder" />
                        </div>
                        <div class="mb-3">
                            <label>Widget Positions (comma-separated)</label>
                            <input type="text" class="form-control" ng-model="formData.widget_positions_str" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" ng-click="saveTheme()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/theme.js') }}"></script>
@endsection
